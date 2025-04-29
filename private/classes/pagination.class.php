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

  /**
   * Calculates the offset for the current page.
   *
   * @return int The offset value for the current page.
   */
  public function offset() {
    return $this->per_page * ($this->current_page - 1);
  }

  /**
   * Calculates the total number of pages.
   *
   * @return int The total number of pages.
   */
  public function total_pages() {
    return ceil($this->total_count / $this->per_page);
  }

  /**
   * Determines the previous page number.
   *
   * @return int|false The previous page number, or false if there is no previous page.
   */
  public function previous_page() {
    $prev = $this->current_page - 1;
    return ($prev > 0) ? $prev : false;
  }

  /**
   * Determines the next page number.
   *
   * @return int|false The next page number, or false if there is no next page.
   */
  public function next_page() {
    $next = $this->current_page + 1;
    return ($next <= $this->total_pages()) ? $next : false;
  }

  /**
   * Generates the HTML for the "Previous" page link.
   *
   * @param string $url The base URL for the pagination links.
   * @return string The HTML for the "Previous" page link, or an empty string if there is no previous page.
   */
  public function previous_link($url="") {
    $link = "";
    if($this->previous_page() != false) {
      $link .= "<li class=\"page-item\"><a href=\"{$url}page={$this->previous_page()}\" class=\"page-link text-dark\">";
      $link .= "&laquo; Previous page </a></li>";
    }
    return $link;
  }

  /**
   * Generates the HTML for the "Next" page link.
   *
   * @param string $url The base URL for the pagination links.
   * @return string The HTML for the "Next" page link, or an empty string if there is no next page.
   */
  public function next_link($url="") {
    $link = "";
    if($this->next_page() != false) {
      $link .= "<li class=\"page-item\"><a href=\"{$url}page={$this->next_page()}\" class=\"page-link text-dark\">";
      $link .= " Next page &raquo;</a></li>";
    }
    return $link;
  }

  /**
   * Generates the HTML for the numbered page links.
   *
   * @param string $url The base URL for the pagination links.
   * @return string The HTML for the numbered page links.
   */
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

  /**
   * Generates the complete HTML for the pagination links.
   *
   * @param string $url The base URL for the pagination links.
   * @return string The HTML for the pagination links, including "Previous", "Next", and numbered links.
   */
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
