/**
***Two ways to get the URL data***
**/

1. Suppose we have an URL - 'www.example.com/abc/xyz', we would get the 'abc' by using this method....

    $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
    $explodeUrl = explode('/', $url_path);
    $x = $explodeUrl[1];
    
2. Suppose we have an URL 'https://www.example.com/abc/xyz', we would get the 'xyz' by using this method....

    $http = $_SERVER['HTTP_HOST'];
    $url_paths = $_SERVER['REQUEST_URI'];
    $whole_url = 'https://' . $http . $url_paths;
    preg_match("/[^\/]+$/", $whole_url, $matches);
    $last_word = $matches[0];
    
    
/**
***Trim text by characters & words***
**/

wp_trim_words( get_the_title(), 10, '...'); //Trim by Words
mb_strimwidth( get_the_title(), 0, 50, '...' ); //Trim by Characters
