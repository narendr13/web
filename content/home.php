<?php
include 'header.php';
session_start();

if(array_key_exists('userid', $_SESSION )){
    $userName = $_SESSION['userid'];
}
else {
        header('Location: index.php?error=notloggedin');
}

?>
<p class="msgs">Welcome to KAKINADA Tourist Information</p>
<p style="font-size:20px;">Kakinada is known for its sweet called Khaja which became a famous recipe in South India known as Kakinada Kaja. Apart from this, it is also known for food. 
There is a cuisine named Subbaiah Hotel which is known in South India for its authentic Vegetarian meals. The city is also home for a snack called Bajji which is famous throughout the state. Along with these it is mostly known for its town planning, one of the most greatly well planned towns in the entire country. 
The Indian Standard Time (IST) exactly passes through this city in the southern part of India. Hope Island, which lies just off the city's coast, naturally acts as a barrier and protects the city from cyclones and tsunami effects which also serves as a tourist spot.</p>
<img style="margin-left:10%;"src="/assets/images/loginbg.jpg" alt="pc">
<p style="font-size:20px;">It used to have about 12 cinema theatres along a road (for which it has a dedicated road named after that as Cinema Road) and is known as Second Madras (because Madras [now Chennai], used to have many cinema theatres along a road). It also has a dedicated road for temples known as Temple Road which justifies its status as the best-planned city. It is also known for its pleasant climate and recreating atmosphere for which it is also known as Pensioner's Paradise indicating as a place to settle for mental peace and health. It is also a gateway for a region called Konaseema which is regarded as Second Kerala which is very famous for its scenic Coconut Trees and picturesque green farm fields surrounded by River Gouthami just like Kerala. It also has one of the largest Mangrove forests in India near a village named Coringa which serves as a great tourist spot in Coringa Wildlife Sanctuary. 
It also has one of the oldest and biggest Government Hospitals of the state known as GGH Kakinada.</p>
