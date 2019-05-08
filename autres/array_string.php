<?php
// http://php.net/manual/fr/ref.strings.php
// http://php.net/manual/fr/ref.array.php
// https://php.net/manual/en/array.sorting.php

// 1 Des functions sur string
    // 1.1 strlen() - Calcule la taille d'une chaîne
    // 1.2 strpos() - Cherche la position de la première occurence dans une chaîne
    // 1.3 str_replace() - Remplace toutes les occurences dans une chaîne
    // 1.4 trim() - Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    // 1.5 rtrim() - Supprime les espaces à la fin de chaîne
    // 1.6 strrev() - Inverse une chaîne
    // 1.7 str_split() - Convertit une chaîne de caractères en tableau
    // 1.8 explode() - Scinde/Divise une chaîne de charactères en segments
    // 1.9 implode() - Rassemble les éléments d'un tableau en une chaîne
    // 2.0 str_word_count() - Retourne le nombre des mots d'une chaine de caractère

// 2 Functions sur array
    // 2.1 count() - Compte toutes les éléments dans un tableau ou quelque chose d'un objet
    // 2.2 array_reverse() - Inverse les éléments d'un tableau
    // 2.3 array_chunk() - Sépare un tableau en tableaux de taille inférieure
    // 2.4 array_map() - Applique une function sur les éléments d'un talbeau 
    // 2.5 array_slice() - Extrait un portion de tableau
    // 2.6 array_splice() - Efface, ajoute et remplace une portion de tableau
    // 2.7 array_merge() - Fusionne plusieurs tableaux un un seul



    // ======================//
    // CREATING ARRAY
    //=======================//

    // 1.1 Creating array with brackets
        // Creating an ASSOCIATIVE ARRAY
    $vegetables['corn'] = 'yellow';
        // Creating an INDEXED ARRAY (PHP automatically assigns a numeric key to each value)
    $vegetables[] = 'yellow';

        // This makes $vegetables an array
        // The square bracket syntax is better 
        // when you are adding elements one by one
    $vegetables['corn'] = 'yellow';
    $vegetables[3] = 'red';
    $vegetables['Intel i7'] = 'Proccesor';

    
    // 1.2 Creating array with array() or []
    $vegetables = array(
        'corn' => 'green',
        '4' => 'tomato',
        'AMD' => 'Athlon',
    );

        // With short array syntax []
    $vegetables = [
        'corn' => 'green',
        '4' => 'tomato',
        'AMD' => 'Athlon'
    ];

    
    // 1.3 Array and scalar collision
    $arrCollision['corn'] = 'yellow';
    // This removes any trace of "corn" and "yellow" 
    // and makes $vegetables a scalar
    $arrCollision = 'yellow';

    
    // 1.4 Adding elements with []
    $lunch[] = 'Dried Mushrooms in Brown Sauce';
    $lunch[] = 'Pineapple and Yu Fungus';

        // Create $dinner with 3 elements
    $dinner = array(
        'Sweet Corn and Asparagus', 'Lemon Chicken',
        'Braised Bamboo Fungus'
    );

        // Add an element to the end of $dinner
    $dinner[] = 'Flank Skin with Spiced Flavor'; 


    // 1.4 Find the size of an array
        // An empty array evaluates to false in an if( ) test expression.
    $dishes = count($dinner);
    // echo 'There are ' . $dishes . ' things for dinner';
    // or
    // print "There are $dishes things for dinner";


    // ==================//
    // LOOPING THROUGH ARRAYS
    // ==================//

    // 2.1 Looping with foreach()

    $meal = array('breakfast' => 'Walnut Bun',
              'lunch' => 'Cashew Nuts and White Mushrooms',
              'snack' => 'Dried Mulberries',
              'dinner' => 'Eggplant with Chili Sauce');
    
    print("<table>");
    foreach($meal as $key => $val) {
        print("<tr>
            <td>$key</td>
            <td>$val</td>
            </tr>");
    }
    print("</table>");


    // 2.2 Alternating table row colors
    $colors = ['gray', 'lightgray'];
    $color_index = 0;

    print("<table>");
    foreach($meal as $key => $val) {
        print '<tr bgcolor="' . $colors[$color_index] . '">';
        print "<td>$key</td><td>$val</td></tr>";
        $color_index = 1 - $color_index;
    }
    print "</table>";


    

    // 2.3 Modifying an array with foreach()
    $meals = array('Walnut Bun' => 1,
               'Cashew Nuts and White Mushrooms' => 4.95,
               'Dried Mulberries' => 3.00,
               'Eggplant with Chili Sauce' => 6.50);
    foreach($meals as $dish => $price) {
        // $price = $price * 2; // Modify only inside of this foreach() and NOT modify the array outside
        // print "<li>The new price of $dish is: $price$</li>";
        $meals[$dish] = $meals[$dish] * 2; // Work properly
    }

    // Iterate over the array again and print the changed values
    foreach($meals as $dish => $price) {
        print "<li>The new price of $dish is: $price$</li>";
    }


    // ATTENTION: foreach() vs for() 
    // With foreach( ), just specify one variable name after as, 
    // and each element value is copied into that variable inside the code block. 
    // However, you can’t access element keys inside the code block.

    // To keep track of your position in the array with foreach( ), 
    // you have to use a separate variable that you increment each time the foreach() 
    // code block runs. With for(), you get the position explicitly in your loop variable. 
    // The foreach( ) loop gives you the value of each array element, 
    // but the for( ) loop gives you the position of each array element. 
    // There’s no loop structure that gives you both at once.
    
    
    // 2.4 Iterating through a numeric array with for()
    $dinner = array('Sweet Corn and Asparagus',
        'Lemon Chicken',
        'Braised Bamboo Fungus');

    for($i = 0; $i < count($dinner); $i++) {
        print "<li>Dish number $i is $dinner[$i]</li>";
    }

    
    // 2.5 Alternating table row colors with for()
    $color_row = ['grey', 'lightgray'];
    print "<table>";
    for($i = 0; $i < count($dinner); $i++) {
        print "<tr bgcolor='" . $color_row[$i % 2] . "'><td>$dinner[$i]</td></tr>";
    }
    print "</table>";

    // Avec foreach()
    $num_color = 0;
    print "<table>";
    foreach ($dinner as $meal) {
        print "<tr bgcolor='" . $color_row[$num_color % 2] . "'><td>$meal</td></tr>";
        $num_color++;
    }
    print "</table>";

    
    // 2.5 Array element order and foreach()
        // When you iterate through an array using foreach(), 
        // the elements are accessed in the order that they were added to the array.
    
    $letters[0] = 'A';
    $letters[1] = 'B';
    $letters[3] = 'D';
    $letters[2] = 'C';

    foreach ($letters as $letter) {
        print $letter; // ABDC
    }

        // To guarantee that elements are accessed in numerical key order, use for()
    for ($i=0; $i < count($letters); $i++) { 
        print $letters[$i]; // ABCD
    }
    

    
    // 2.6 array_key_exists() return true||false - Checking for an element with a particular key
    $meals = array('Walnut Bun' => 1,
               'Cashew Nuts and White Mushrooms' => 4.95,
               'Dried Mulberries' => 3.00,
               'Eggplant with Chili Sauce' => 6.50,
               'Shrimp Puffs' => 0);

    $books = array("The Eater's Guide",
               'How to Cook in Chinese');
    
    if (array_key_exists('Shrimp Puffs', $meals)) {
        print "Yes, it exists<br>";
    }
    (array_key_exists(3, $books)) ? "" : print "No, it does not exist<br>";

    
    // 2.7 in_array() return true||false - Checking for an element with a particular value
    if (in_array(1, $meals)) {
        print "Yes, it exists<br>";
    }
    // In this case it return false because 
    // in_array() it is case-sensitive when it compares strings.
    (in_array('how to cook in chinese', $books)) ? "": print "No, it does not exists<br>";


    // 2.8 array_search() - Finding an element with a particular value
        // It returns the name of the value
    $dish = array_search(3.00, $meals);
    if ($dish) {
        print "$dish costs 3.00<br>";
    }

    
    // =====================//
    // MODIFYING ARRAYS
    // =====================//


    // 3.1 Interpolating array element values in double-quoted strings
        // The interpolation works only with array keys that consist 
        // exclusively of letters, numbers, and underscores.
    $meals['breakfast'] = 'Walnut Bun';
    $meals[0] = 'Eggs';
    print 'The breakfast is' . $meals['breakfast'] . '<br>';
    print "$meals[0]<br>";

    // 3.2  Interpolating array element values with curly braces
    $meals['Walnut Bun'] = '$3.95';
    $hosts['www.example.com'] = 'web site';

    // If there is an array key that has whitespace 
    // or other punctuation in it, interpolate it with curly braces
    print "Walnut Bun costs {$meals['Walnut Bun']}<br>";
    print "www.example.com is {$hosts['www.example.com']}<br>";



    // 3.3 Removing an element with unset()
    $meals['dinner'] = 'Chicken Bun';
    $meals[0] = 'Stuffed Duck Web';

        // Setting only the element value to 0 or the empty string
    $meals[0] = '';
    $meals[0] = 0;
    
    // Is different than just setting the element value to 0 or the empty string. 
    // When you use unset( ), the element is no longer in the array
    unset($meals[0]);
    

    // 3.4 Making a string from an array with implode()
        // Print all of the values in an array at once
    $dimsum = array('Chicken Bun','Stuffed Duck Web','Turnip Cake');
    $menu = implode('<br>', $dimsum);
    print $menu;



    // ======================//
    // SORTING ARRAYS
    // ======================//

    // 4.1 Sorting with sort() - ascending alphabetical order
        // The sort() function sorts an array by its element values. 
        // It should only be used on numeric key of array, 
        // because it resets the keys of the array when it sorts.
    $dinner = array('Sweet Corn and Asparagus',
        'Lemon Chicken',
        'Braised Bamboo Fungus');
    $meal = array('breakfast' => 'Walnut Bun',
        'lunch' => 'Cashew Nuts and White Mushrooms',
        'snack' => 'Dried Mulberries',
        'dinner' => 'Eggplant with Chili Sauce');


    // Before sorting
    foreach($dinner as $key => $val) {
        print "<li>\$dinner : $key | $val</li>";
    }
    foreach($meal as $key => $val) {
        print "<li>\$meal : $key | $val</li>";
    }

    sort($dinner);
    sort($meal);
    // The keys in $meal, have been replaced by numbers from 0 to 3.

    // After sorting
    print "<br>";
    foreach($dinner as $key => $val) {
        print "<li>\$dinner : $key | $val</li>";
    }
    foreach($meal as $key => $val) {
        print "<li>\$meal : $key | $val</li>";
    }




    // 4.2 Sorting with asort() - ascending alphabetical order
        // To sort an associative array by element value, use asort(). 
        // This keeps keys together with their values.
    // Before sorting
    foreach($meal as $key => $val) {
        print "<li>\$meal : $key | $val</li>";
    }

    asort($meal);
    print "<br>";

    // After sorting
    foreach($meal as $key => $val) {
        print "<li>\$meal : $key | $val</li>";
    }




    // 4.3 Sorting with ksort() - ascending alphabetical order
        // Sort arrays by key with ksort(). 
        // This keeps key/value pairs together, but orders them by key.
    // Before sorting
    foreach($meal as $key => $val) {
        print "<li>\$meal : $key | $val</li>";
    }

    ksort($meal);
    print "<br>";

    // After sorting
    foreach($meal as $key => $val) {
        print "<li>\$meal : $key | $val</li>";
    }

    
    // 4.4 The reverse-sorting functions are rsort(), arsort(), krsort() - descending alphabetical order
        // They work exactly as sort(), asort(), and ksort()

        
    // ========================//
    // USING MULTIDIMENSIONAL ARRAYS
    // ========================//
    
    // 5 Creating an Multidimensional arrays and add somme elements
        // Each level of an array is called a dimension
    $arrayMulti['newSubArray'][] = 'value1';
    $arrayMulti['newSubArray'][] = 'value2';


    // Creating multidimensional arrays with array()
    $meals = array('breakfast' => array('Walnut Bun','Coffee'),
                   'lunch'     => array('Cashew Nuts', 'White Mushrooms'),
                   'snack'     => array('Dried Mulberries','Salted Sesame Crab'));

    $lunches = array( array('Chicken','Eggplant','Rice'),
                    array('Beef','Scallions','Noodles'),
                    array('Eggplant','Tofu'));

    $flavors = array('Japanese' => array('hot' => 'wasabi',
                                        'salty' => 'soy sauce'),
                    'Chinese'  => array('hot' => 'mustard',
                                        'pepper-salty' => 'prickly ash'));

    print $meals['snack'][0] . "<br>"; // Dried Mulberries
    print $lunches[1][0] . "<br>"; // Beef
    print $flavors['Japanese']['hot'] . "<br>"; // wasabi


    // 5.1 Manipulating multidimensional arrays
    $prices['dinner']['Sweet Corn and Asparagus'] = 12.50;
    $prices['lunch']['Cashew Nuts and White Mushrooms'] = 4.95;
    $prices['dinner']['Braised Bamboo Fungus'] = 8.95;

    // Create a new two-dimensional array name 'total'
    $prices['dinner']['total'] = $prices['dinner']['Sweet Corn and Asparagus'] +
                                $prices['dinner']['Braised Bamboo Fungus'];

    $specials[0][0] = 'Chestnut Bun';
    $specials[0][1] = 'Walnut Bun';
    $specials[1][0] = 'Chestnut Salad';
    $specials[1][1] = 'Walnut Salad';
    // Leaving out the index adds it to the end of the array
    $specials[1][] = 'Peanut Salad';


    // 5.2 Iterating through a multidimensional array with foreach()
        // To iterate through each dimension of a multidimensional array, 
        // use nested foreach( ) or for( ) loops.

    // $culture is the key and $culture_flavors is the value (an array)
    foreach($flavors as $coulture => $coulture_flavors) {
        // $flavor is the key and $example is the value
        foreach($coulture_flavors as $flavor => $exemple) {
            print "A $coulture $flavor flavor is $exemple<br>";
        }
    }


    // 5.3 Iterating through a multidimensional array with for( )
    $specials = array( array('Chestnut Bun', 'Walnut Bun', 'Peanut Bun'),
                   array('Chestnut Salad','Walnut Salad', 'Peanut Salad') );

    // $num_specials is 2: the number of elements in the first dimension of $specials
    for ($i = 0, $num_specials = count($specials); $i < $num_specials; $i++) {
        // $num_sub is 3: the number of elements in each sub-array
        for ($m = 0, $num_sub = count($specials[$i]); $m < $num_sub; $m++) {
            print "Element [$i][$m] is " . $specials[$i][$m] . "<br>";
        }
    }


    var_dump($flavors);