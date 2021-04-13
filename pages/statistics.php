<?php

/**
 * @var object $connection
 */
include './partials/header.php';

// if environment is production use remote database, else use local
if (getenv('environment') == 'production') {
	$get_user_scores_ordered_by_wins_count =
		"SELECT u.username, s.date_created, s.score, r.result
         FROM heroku_6b647d0a28c075b.users AS u
         JOIN heroku_6b647d0a28c075b.scores s on s.user_id = u.user_id
		 JOIN heroku_6b647d0a28c075b.results r on s.is_win = r.result_id
         WHERE s.date_deleted is null AND u.date_deleted is null
         ORDER BY u.wins_count DESC, s.score DESC";
} else {
	$get_user_scores_ordered_by_wins_count =
		"SELECT u.username, s.date_created, s.score, r.result
         FROM itvillage.users AS u
         JOIN itvillage.scores s on s.user_id = u.user_id
		 JOIN itvillage.results r on s.is_win = r.result_id
         WHERE s.date_deleted is null AND u.date_deleted is null
         ORDER BY u.wins_count DESC, s.score DESC";
}

$result = mysqli_query($connection, $get_user_scores_ordered_by_wins_count);

?>

<main id="main">
    <section class="project">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
            </header>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="" data-aos="zoom-out" data-aos-delay="200">
                        <div class="section-header text-center">
                            <p>Статистики</p>
                            <hr>

                            <?php

							echo "<table class='table table-responsive table-striped table-hover table-bordered'>";
							echo "<caption>Резултатите на всички играли потребители.</caption>";
							echo "<tr>";
                                echo "<td class='reduced-size-ten-percent'>#</td>";
                                echo "<td class='reduced-size'>Потребител</td>";
                                echo "<td class='reduced-size'>Дата на игра</td>";
							    echo "<td class='reduced-size'>Точки</td>";
							    echo "<td class='reduced-size'>Резултат</td></tr>";

							$counter = 1;
							while ($row = mysqli_fetch_assoc($result)) {
								$username = htmlspecialchars($row['username']);
								$date_created = htmlspecialchars($row['date_created']);
								$score =  htmlspecialchars($row['score']);
								$is_win =  htmlspecialchars($row['result']);

								echo "<tr><td>$counter</td><td>$username</td><td>$date_created</td><td>$score</td><td>$is_win</td></tr>";
								$counter++;
							}
							echo "</table>";

							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php

include './partials/footer.php';

?>
