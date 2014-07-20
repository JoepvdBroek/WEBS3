<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $title }}</title>
</head>

<header>
<?php

/*function display_menu($parent, $level) { 
     $categories = Category::all();
        echo "<ul class='menu'>"; 
        //while ($row = mysqli_fetch_assoc($result)) { 
        foreach ( $categories as $category) {
            if ($row['Count'] > 0) { 
                echo $category->name;
                $this->display_menu($row['CategoryId'], $level + 1); 
                echo "</li>"; 
            } elseif ($row['Count']==0) { 
                echo $category->name; 
            } else; 
        } 
        echo "</ul>"; 
    }

display_menu(0,1);
*/

$categories = Category::where('parent', '<>', '0')->get();

echo HTML::link('products', 'Home');

foreach ($categories as $category) {
    echo " | ";
    echo HTML::linkRoute('category', $category->name, array($category->id)); 
}

?>
</header>
<body>
	@yield('content')
</body>
</html>