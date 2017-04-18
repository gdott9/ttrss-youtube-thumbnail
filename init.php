<?php
class Af_Youtube_Thumbnail extends Plugin {
  function about() {
    return array(0.1,
      "Add the thumbnail for Youtube videos",
      "gdott9");
  }

  function init($host) {
    $host->add_hook($host::HOOK_ARTICLE_FILTER, $this);
  }

  function hook_article_filter($article) {
    if(strpos($article["link"], "youtube.com") !== FALSE) {
      $video_id = str_replace('https://www.youtube.com/watch?v=', '', $article["link"]);
      $article["content"] = '<img src="https://img.youtube.com/vi/'.$video_id.'/hqdefault.jpg" alt="'.$article["title"].'" /><br />'.$article["content"];
    }

    return $article;
  }

  function api_version() { return 2; }
}
