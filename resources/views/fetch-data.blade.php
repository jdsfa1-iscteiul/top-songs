<?php 

    $servername = "localhost";
    $username = "dev";
    $password = "12345";
    $dbname = "topsongs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $ch = curl_init();
    $token = 'BQC1OiaoeAlUEHINohSpqv3B81qGjjbM9CcfaDX81zFoZCSANZhH_rtxxxKsWcLmThSdntobWC_RPYstYCalkHf3Emi4czJDaUhSVOn_P6RR1K4Sh4It_lUVQasNx_eLTC2KJHl9UtDK';

    curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/playlists/37i9dQZF1DX0rV7skaITBo");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer '.$token."'"
    ));
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $json = json_decode($result, true);
    $tracks = $json['tracks'];
    $items = $tracks['items'];
    $index = 1;
    foreach($items as $item) {
        $track = $item['track'];
        $album = $track['album'];
        $album_name = $album['name'];
        $artists = $album['artists'];
        $artist = $artists[0];
        $artist_name = $artist['name'];
        $artist_external_urls = $artist['external_urls'];
        $artist_url = $artist_external_urls['spotify'];
        $images = $album['images'];
        $image = $images[0];
        $image_url = $image['url'];
        $name = $track['name'];
        $track_external_urls = $track['external_urls'];
        $song_url = $track_external_urls['spotify'];

        $sql = '
        INSERT INTO songs 
        (
            name, 
            artist, 
            album, 
            week, 
            album_image_url, 
            position, 
            artist_url, 
            song_url, 
            created_at, 
            updated_at
        )
        VALUES 
        (
            "'.$name.'",
            "'.$artist_name.'",
            "'.$album_name.'",
            YEARWEEK(NOW()),
            "'.$image_url.'",
            "'.$index.'",
            "'.$artist_url.'",
            "'.$song_url.'",
            NOW(),
            NOW()
        )';

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $index++;
    }

    $conn->close();
?>