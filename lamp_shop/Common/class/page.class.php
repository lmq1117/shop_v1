<?php
	class Page {
		private $total;                 //数据表中总记录数
		private $listRows;              //每页显示行数 不传时默认为10行
		private $limit;                 //sql语句limit条件
		private $uri;                   //uri剥离page参数之后的uri
        private $pageNum;               //总页数
        //默认显示文字
		private $config=array('header'=>"个记录", "prev"=>"上一页", "next"=>"下一页", "first"=>"首 页", "last"=>"尾 页");
        private $listNum = 8;           //分页中显示几个可以点击的页码??
        private $paramSymbol;                  //url中的其它参数 空字符串 表示无其它参数 字符串"a=b" 表示有1对参数 array("a"=>"1","b"=>"2")表示有多对参数
		/*
		 * $total 
		 * $listRows
		 */
		public function __construct($total, $listRows=10, $pa=""){
            
            $this->total=$total;
            //
            $this->listRows=$listRows;
            //
            $this->uri = $this->getUri($pa);
            $this->paramSymbol = $this->paramSymbol($pa);
			$this->page = !empty($_GET["page"]) ? $_GET["page"] : 1;
			$this->pageNum = ceil($this->total/$this->listRows);
            $this->limit=$this->setLimit();
            
		}
        
        //返回当前页的limit语句值
        private function setLimit(){
            //拼接limit条件
			return "Limit ".($this->page-1)*$this->listRows.", {$this->listRows}";
        }

        //分页参数是用'?' or '&'
        private function paramSymbol($pa)
        {
            //如果传入的其它参数是空字符串，返回 ？
            if(empty($pa) || $pa == '')
            {  
               return '?';
            }
            else
            {//有其它参数
                return '&';
            }
        }
        
        //返回剥离page=1之后的url
        private function getUri($pa){
            //echo $pa . '++++++++++++++++++';
            //[REQUEST_URI] => /objiect04/lamp_shop/Admin/server.php?page=1&num=2 脚本在网站中的位置
            //strpos $needle在￥haystack中首次出现的位置，没出现就返回假
            $url=rtrim($_SERVER["REQUEST_URI"].(strpos($_SERVER["REQUEST_URI"], '?')?'':"?").$pa,'?');
			//echo $url;
            //  /objiect04/lamp_shop/Admin/server.php?page=1&num=2
            //  解析后是:
            //  Array
            //    (
            //        [path] => /objiect04/lamp_shop/Admin/server.php
            //        [query] => page=1&num=2
            //    )
            $parse=parse_url($url);
            //echo "<pre>";
            //    print_r($parse);
            //echo "</pre>";

		
            //存在？之后部分
            if(isset($parse["query"])){
                //
				parse_str($parse['query'],$params);
                unset($params["page"]);
                if(!empty($params))
                {
                    //
                    //echo '---'. http_build_query($params) . '----------';
				    $url = $parse['path'].'?'.http_build_query($params);
                }
                else
                {
                    //echo $url;
                    $url = rtrim($parse['path'],'?');
                }
				
			}
            
			return $url;
		}

        //__get 魔术方法 读取不可访问属性的值时，__get() 会被调用。
	    public function __get($args){
			if($args=="limit")
				return $this->limit;
			else
				return null;
		}
        
        //每页是从第几条开始的
		private function start(){
			if($this->total==0)
				return 0;
			else
				return ($this->page-1)*$this->listRows+1;
		}

        //每页最后一条是第几条
		private function end(){
			return min($this->page*$this->listRows,$this->total);
		}

        //首页
		private function first(){
            if($this->page==1)
                //
				$html='';
			else
				$html = "&nbsp;&nbsp;<a href='{$this->uri}{$this->paramSymbol}page=1'>{$this->config["first"]}</a>&nbsp;&nbsp;";

			return $html;
		}
    
        //上一页
		private function prev(){
			if($this->page==1)
				$html='';
			else
				$html = "&nbsp;&nbsp;<a href='{$this->uri}".$this->paramSymbol."page=".($this->page-1)."'>{$this->config["prev"]}</a>&nbsp;&nbsp;";

			return $html;
		}
        
        //生成可带数字的可点击的页码列表
		private function pageList(){
			$linkPage="";
			
			$inum=floor($this->listNum/2);
		    
            //当前页前的部分
			for($i=$inum; $i>=1; $i--){
				$page=$this->page-$i;

				if($page<1)
					continue;

				$linkPage.="&nbsp;<a href='{$this->uri}{$this->paramSymbol}page={$page}'>{$page}</a>&nbsp;";

			}

            //当前页不可点
			$linkPage.="&nbsp;{$this->page}&nbsp;";
			
            //当前页之后的部分
			for($i=1; $i<=$inum; $i++){
				$page=$this->page+$i;
				if($page<=$this->pageNum)
					$linkPage.="&nbsp;<a href='{$this->uri}{$this->paramSymbol}page={$page}'>{$page}</a>&nbsp;";
				else
					break;
			}

			return $linkPage;
		}
        
        //下一页
		private function next(){
			if($this->page==$this->pageNum)
				$html='';
			else
				$html="&nbsp;&nbsp;<a href='{$this->uri}".$this->paramSymbol."page=".($this->page+1)."'>{$this->config["next"]}</a>&nbsp;&nbsp;";

			return $html;
		}
        
        //尾页
		private function last(){
			if($this->page==$this->pageNum)
				$html='';
			else
				$html="&nbsp;&nbsp;<a href='{$this->uri}".$this->paramSymbol."page=".($this->pageNum)."'>{$this->config["last"]}</a>&nbsp;&nbsp;";

			return $html;
        }


        
        //输入页面回车，直接跳转到第几页
		private function goPage(){
			return '&nbsp;&nbsp;<input type="text" onkeydown="javascript:if(event.keyCode==13){var page=(this.value>'.$this->pageNum.')?'.$this->pageNum.':this.value;location=\''.$this->uri.$this->paramSymbol.'page=\'+page+\'\'}" value="'.$this->page.'" style="width:25px"><input type="button" value="GO" onclick="javascript:var page=(this.previousSibling.value>'.$this->pageNum.')?'.$this->pageNum.':this.previousSibling.value;location=\''.$this->uri.$this->paramSymbol.'page=\'+page+\'\'">&nbsp;&nbsp;';
        }

        //
		function config($display=array(0,1,2,3,4,5,6,7,8)){
			$html[0]="&nbsp;&nbsp;共有<b>{$this->total}</b>{$this->config["header"]}&nbsp;&nbsp;";
			$html[1]="&nbsp;&nbsp;每页显示<b>".($this->end()-$this->start()+1)."</b>条，本页<b>{$this->start()}-{$this->end()}</b>条&nbsp;&nbsp;";
			$html[2]="&nbsp;&nbsp;<b>{$this->page}/{$this->pageNum}</b>页&nbsp;&nbsp;";
			
			$html[3]=$this->first();
			$html[4]=$this->prev();
			$html[5]=$this->pageList();
			$html[6]=$this->next();
			$html[7]=$this->last();
			$html[8]=$this->goPage();
			$fpage='';
			foreach($display as $index){
				$fpage.=$html[$index];
			}

			return $fpage;

		}

	
	}
