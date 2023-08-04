<?php


$connect = new PDO("mysql:host=localhost;dbname=db_image360", "root", "");

if (isset($_POST["rating_data"])) {

    $data = array(
        ':id_products' =>'1',
        ':id_user' => '2',
        ':comment' => $_POST["comment"],
        ':rate' => $_POST["rating_data"],
        ':time_rate' => time(),
    );
var_dump($data);die;
    $query = "
	INSERT INTO rate 
	(id_products, id_user, comment, rate, time_rate) 
	VALUES (:id_products, :id_user, :comment, :rate, :time_rate)
	";

    $statement = $connect->prepare($query);

    $statement->execute($data);

    echo "Your Review & Rating Successfully Submitted";

}

if (isset($_POST["action"])) {
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_rate = 0;
    $review_content = array();

    $query = "
	SELECT * FROM rate 
	ORDER BY id_rate DESC
	";

    $result = $connect->query($query, PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $review_content[] = array(
            'id_products' => $row["id_products"],
            'id_user' => $row["id_user"],
            'comment' => $row["comment"],
            'rating' => $row["rate"],
            'time_rate' => date('l jS, F Y h:i:s A', $row["time_rate"])
        );

        if ($row["rate"] == '5') {
            $five_star_review++;
        }

        if ($row["rate"] == '4') {
            $four_star_review++;
        }

        if ($row["rate"] == '3') {
            $three_star_review++;
        }

        if ($row["rate"] == '2') {
            $two_star_review++;
        }

        if ($row["rate"] == '1') {
            $one_star_review++;
        }

        $total_review++;

        $total_rate = $total_rate + $row["rate"];

    }

    $average_rating = $total_rate / $total_review;

    $output = array(
        'average_rating' => number_format($average_rating, 1),
        'total_review' => $total_review,
        'five_star_review' => $five_star_review,
        'four_star_review' => $four_star_review,
        'three_star_review' => $three_star_review,
        'two_star_review' => $two_star_review,
        'one_star_review' => $one_star_review,
        'review_data' => $review_content
    );

    echo json_encode($output);

}

?>