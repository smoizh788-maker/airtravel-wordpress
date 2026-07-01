<?php
function flight_table_shortcode() {

    ob_start();

    $args = array(
        'post_type'      => 'flight',
        'posts_per_page' => -1,
        'post_status'    => 'publish'
    );

    $flights = new WP_Query($args);

    if($flights->have_posts()){

        ?>

        <div class="flight-table-wrapper">

            <table class="flight-table">

                <thead>

                    <tr>

                        <th>Airline</th>
                        <th>Route</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Seat</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                <?php

                while($flights->have_posts()){

                    $flights->the_post();

                    $logo = get_field('airline_logo');
                    $airline = get_field('flight_details');
                    $from = get_field('form_city');
                    $to = get_field('to_city');
                    $date = get_field('flight_date');
                    $duration = get_field('duration');
                    $price = get_field('prices');
                    $seat = get_field('seat_class');
                    $url = get_field('book_url');

                    ?>

                    <tr>

                        <td>

                            <?php if($logo){ ?>

                                <img src="<?php echo esc_url($logo['url']); ?>" width="45">

                            <?php } ?>


                        </td>

                        <td>

                            <?php echo esc_html($from); ?>

                            →

                            <?php echo esc_html($to); ?>

                        </td>

                        <td><?php echo esc_html($date); ?></td>

                        <td><?php echo esc_html($duration); ?></td>

                        <td>

                            $<?php echo esc_html($price); ?>

                        </td>

                        <td>

                            <?php echo esc_html($seat); ?>

                        </td>

                        <td>

                            <a href="<?php echo esc_url($url); ?>" class="book-btn">

                                Book Now

                            </a>

                        </td>

                    </tr>

                    <?php

                }

                ?>

                </tbody>

            </table>

        </div>

        <?php

    }

    wp_reset_postdata();

    return ob_get_clean();

}

add_shortcode('flight_table','flight_table_shortcode');
