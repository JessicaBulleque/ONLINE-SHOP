<?php
    include "../connection.php";

    if(isset($_POST['add-movie']) && isset($_FILES['poster']) && $_FILES['banner']){
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $year = $_POST['year'];
        $duration = $_POST['duration'];
        $rating = $_POST['rating'];
        $desc = $_POST['desc'];
        $trailer = $_POST['trailer'];
        $director = $_POST['director'];
        $cast = $_POST['cast'];
        $price = $_POST['price'];

        $date = $_POST['date'];
        $cinema = $_POST['cinema'];

       
    
        $poster_name = $_FILES['poster']['name'];
        $poster_size = $_FILES['poster']['size'];
        $poster_tmpName = $_FILES['poster']['tmp_name'];
        $poster_error = $_FILES['poster']['error'];

        $banner_name = $_FILES['banner']['name'];
        $banner_size = $_FILES['banner']['size'];
        $banner_tmpName = $_FILES['banner']['tmp_name'];
        $banner_error = $_FILES['banner']['error'];
        
       if($poster_error === 0 && $banner_error === 0){
            $poster_ext = pathinfo($poster_name, PATHINFO_EXTENSION);
            $banner_ext = pathinfo($banner_name, PATHINFO_EXTENSION);

            $poster_ext_lc = strtolower($poster_ext);
            $banner_ext_lc = strtolower($banner_ext);
           
            $allowed_ext = array("jpg","jpeg", "png");

            if(in_array($poster_ext_lc, $allowed_ext) && in_array($banner_ext_lc, $allowed_ext)){
                $new_poster_name = uniqid("poster-").'.'.$poster_ext_lc;
                $new_banner_name = uniqid("banner-").'.'.$banner_ext_lc;

                $img_poster_path = "../img/".$new_poster_name;
                $img_banner_path = "../img/".$new_banner_name;

                move_uploaded_file($poster_tmpName, $img_poster_path);
                move_uploaded_file($banner_tmpName, $img_banner_path);
                
                // COUNT MOVIE
                $countQuery = mysqli_query($conn, "SELECT COUNT(*) AS Count FROM movie");
                $CountResult = mysqli_fetch_assoc($countQuery);
                $movieID = 'movie-0'.($CountResult['Count'] + 1);
                
                // INSERT INTO DATABASE //
                $insertQuery = "INSERT INTO `movie`
                (`movieID`, `Title`, `Genre`, `Year`, `Duration`, `Rating`, `Description`,`Director`,`Cast`, `Poster`, `Banner`, `Trailer`, `Price`) VALUES 
                ('$movieID', '$title', '$genre', '$year', '$duration', '$rating', '$desc', '$director', '$cast', '$new_poster_name', '$new_banner_name', '$trailer', '$price')";

                foreach($cinema as $availableCinema){
                    $cinemaInsert = mysqli_query($conn, "INSERT INTO `movie_available_date`(`movieID`, `availableDate`, `cinemaID`) VALUES ('$movieID','$date','$availableCinema')");
                }

                $insert = mysqli_query($conn, $insertQuery);
                
                if(!$insert){
                    echo mysqli_error($conn);
                }
                else{
                    echo "Inserted Successfuly";
                }
            }
            else{
                header("Location:dashboard.php?");
            }
        
       }
       else{
            header("Location:dashboard.php?");
       }


    } else{
        header("Location:dashboard.php?");
    }
?>