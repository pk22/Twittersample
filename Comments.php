
<?php
date_default_timezone_set('UTC');
class Persistence {
  
  private $data = array();
	
  function __construct() 
  {
	  
	
    session_start();
    
    if( isset($_SESSION['tweet_comments']) == true ){
      $this->data = $_SESSION['tweet_comments'];
    }
  }
   
  /**
   * Get all comments for the given post.
   */
  function get_comments($comment_post_ID) {
    $comments = array();
	
    if( isset($this->data[$comment_post_ID]) == true ) {
      $comments = $this->data[$comment_post_ID];
    }
	
    return $comments;
  }
  
  /**
   * Get all comments.
   */
  function get_all_comments() {
    return $this->data;
  }
  
  /**
   * Store the comment.
   */
  function add_comment($vars) {
    
    $added = false;
    
    $comment_post_ID = $vars['comment_post_ID'];
    $input = array(
  
     'commenttext' => $vars['commenttext'],
     'comment_post_ID' => $comment_post_ID,
     'date' => date('r'));
    
    
      
      $input['id'] = uniqid('comment_');
	  print_r($input);
      
      $this->data[$comment_post_ID][] = $input;
      
      $this->sync();
      
      $added = $input;
    
    return $added;
  }
  
  function delete_all() {
    $this->data = array();
    $this->sync();
  }
  
  private function sync() {
    $_SESSION['tweet_comments'] = $this->data;    
  }
 
   
  
  
}
?>