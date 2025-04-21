<?php 

class Pagination {
  public $current_page;
  public $per_page;
  public $total_count;

  public function __construct($page=1, $per_page=20, $total_count=0) {
    $this->current_page = (int) $page;
    $this->per_page = (int) $per_page;
    $this->total_count = (int) $total_count;
  }

  public function offset() {
    return $this->per_page * ($this->current_page - 1);
  }

  public function total_pages() {
    return ceil($this->total_count / $this->per_page);
  }

  public function previous_page() {
    $prev = $this->current_page - 1;
    return ($prev > 0) ? $prev : false;
  }

  public function next_page() {
    $next = $this->current_page + 1;
    return ($next <= $this->total_pages()) ? $next : false;
  }

  public function previous_link($url="") {
    $link = "";
    if($this->previous_page() != false) {
      $link .= "<li class=\"page-item\"><a href=\"{$url}page={$this->previous_page()}\" class=\"page-link text-dark\">";
      $link .= "&laquo; Previous page </a></li>";
    }
    return $link;
  }

  public function next_link($url="") {
    $link = "";
    if($this->next_page() != false) {
      $link .= "<li class=\"page-item\"><a href=\"{$url}page={$this->next_page()}\" class=\"page-link text-dark\">";
      $link .= " Next page &raquo;</a></li>";
    }
    return $link;
  }

  public function number_links($url="") {
    $output = "";
    for($i=1; $i <= $this->total_pages(); $i++) {
      if($i == $this->current_page) {
        $output .= "<li class=\"active page-item\"><a class=\"page-link bg-warning text-dark\">{$i}</a></li>";
      } else {
        $output .= "<li class=\"page-item\"><a href=\"{$url}page={$i}\" class=\"page-link text-dark\">{$i}</a></li>";
      }
    }
    return $output;
  }

  public function page_links($url="") {
    $output = "";
    if($this->total_pages() > 1) { 
      $output .= "<nav aria-label=\"Page navigation.\">";
      $output .= "<ul class=\"pagination container my-3 justify-content-center\">";
      $query_separator = (strpos($url, '?') === False) ? '?' : '&';
      $output .= $this->previous_link($url . $query_separator);
      $output .= $this->number_links($url . $query_separator);
      $output .= $this->next_link($url . $query_separator);
      $output .= "</ul>";
    } 
    return $output;
  }


}
