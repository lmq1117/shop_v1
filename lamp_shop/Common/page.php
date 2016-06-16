<?php
    /*
     *  分页函数
     *  @param $totalItem int desc          总条数
     *  @param $perPageNum int desc         每页显示几条
     *  @param $colSpan int desc            表格有几列
     *
     */
    function pageInfo($totalItem,$perPageNum,$colSpan)
    {
        //计算总页数
        $pages = ceil($totalItem / $perPageNum);


    }
