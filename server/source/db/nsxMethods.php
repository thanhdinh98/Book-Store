<?php
namespace DB\NSXMethods{
    
    function ThemNSX($nsx){
        return "call usp_ThemNSX('$nsx->tenNSX');";
    }

    function LoadNSX($q){
        if($q){
            return "call usp_LoadNSXQuery('$q');";
        }
        return 'call usp_LoadNSX();';
    }

    function XoaNSX($id){
        return "call usp_XoaNSX('$id');";
    }

    function LoadNSXId($id){
        return "call usp_LoadNSXId('$id');";
    }

    function SuaNSX($nsx){
        return "call usp_SuaNSX('$nsx->id', '$nsx->tenNSX');";
    }
}