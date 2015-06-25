<?php
namespace utils;
class Pagination {
    public $total;
    public $limit;
    public $pages;
    public $page;
    public $offset;
    public $start;
    public $end;
    
    public function __construct($links, $count) {        
        $this->total = $count;
        $this->limit = 5;
        $this->pages = ceil($this->total / $this->limit);
        $this->page = min($this->pages,$links['page']);
        $this->offset = ($this->page - 1) * $this->limit;
        $this->start = $this->offset + 1;
        $this->end = min(($this->offset + $this->limit), $this->total);
    }
    public function createLinks($links) {
        foreach ($links as $link =>$value){
            if($link !="p" && $link !="page"){
                $filters[]=$value;
            }            
        }
        $filters = implode("/", $filters);
        if($this->page >0 && $this->page <= $this->pages){
            $start = ($this->page-1)*5;
            $end = $start + 5;
        }else {
            $start = 0;
            $end = 5;
        }
        $adjacents = 2;
        $html = "<div id='paginate'>";
        if($this->page == 1){
            $html .= "<div class='element disabled'><a href='".$links['p']."/" .  $this->page . "/".$filters."'>&laquo;</a></div>"; 
        } else {
            $html .= "<div class='element'><a href='".$links['p']."/" .  ($this->page-1) . "/".$filters."'>&laquo;</a></div>"; 
        }
        if($this->page > $adjacents+2){        
            $html   .= "<div class='element'><a href='".$links['p']."/1/".$filters."'>1</a></div>";    
            $html   .= "<div class='element disabled'><span>...</span></div>";
        }
        $pagemin = ($this->page > $adjacents) ? ($this->page - $adjacents) : 1;
        $pagemax = ($this->page < ($this->pages - $adjacents)) ? ($this->page + $adjacents) : $this->pages;
        for ($i = $pagemin; $i <= $pagemax; $i++) {
            $class  = ( $this->page == $i ) ? "active" : "";
            if ($i == $this->page) {
                $html   .= "<div class='element " . $class . "'><a href='".$links['p']."/" . $i . "/".$filters."'>" . $i . "</a></div>";
            } elseif ($i == 1) {
                $html   .= "<div class='element" . $class . "'><a href='".$links['p']."/1/".$filters."'>1</a></div>";
            } else {
               $html   .= "<div class='element " . $class . "'><a href='".$links['p']."/" . $i . "/".$filters."'>" . $i . "</a></div>";
            }
        }
        if ($this->page < ($this->pages - $adjacents-1)) {
            $html   .= "<div class='element disabled'><span>...</span></div>";
            $html   .= "<div class='element " . $class . "'><a href='".$links['p']."/" . $this->pages . "/".$filters."'>" . $this->pages . "</a></div>";
        }
        if ($this->page < $this->pages) {
            $html .= "<div class='element'><a href='".$links['p']."/" . ( $this->page + 1 ) . "/".$filters."'>&raquo;</a></div>";
        } else {
            $html .= "<div class='element disabled'><a href='".$links['p']."/" . ( $this->page + 1 ) . "/".$filters."'>&raquo;</a></div>";
        }
        $html.= "";
        return $html;
    }
}
