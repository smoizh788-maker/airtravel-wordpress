<?php
get_header();

while ( have_posts() ) :
the_post();

$logo = get_field('airline_logo');
$flight_name = get_field('flight_details');
$flight_number = get_field('flight_number');
$from = get_field('form_city');
$to = get_field('to_city');
$date = get_field('flight_date');
$departure = get_field('departure_time');
$arrival = get_field('arrival_time');
$duration = get_field('duration');
$price = get_field('prices');
$seat = get_field('seat_class');
$overview = get_field('overview');
$baggage = get_field('baggage');
$refund = get_field('refund_policy');
$book = get_field('book_url');
?>

<div class="flight-single">

    <div class="flight-hero">

        <div class="flight-logo">

            <?php if($logo){ ?>

                <img src="<?php echo esc_url($logo['url']); ?>" alt="">

            <?php } ?>

        </div>

        <div class="flight-title">

            <h1><?php echo esc_html($flight_name); ?></h1>

            <h3><?php echo esc_html($flight_number); ?></h3>

            <p>

                <?php echo esc_html($from); ?>

                ✈

                <?php echo esc_html($to); ?>

            </p>

        </div>

        <div class="flight-price">

            <span>$<?php echo esc_html($price); ?></span>

        </div>

    </div>

    <div class="flight-info">

    <div class="info-card">
        <h4>📅 Flight Date</h4>
        <p><?php echo esc_html($date); ?></p>
    </div>

    <div class="info-card">
        <h4>🕒 Departure</h4>
        <p><?php echo esc_html($departure); ?></p>
    </div>

    <div class="info-card">
        <h4>🕕 Arrival</h4>
        <p><?php echo esc_html($arrival); ?></p>
    </div>

    <div class="info-card">
        <h4>⏳ Duration</h4>
        <p><?php echo esc_html($duration); ?></p>
    </div>

    <div class="info-card">
        <h4>💺 Seat Class</h4>
        <p><?php echo esc_html($seat); ?></p>
    </div>

    <div class="info-card">
        <h4>🎒 Baggage</h4>
        <p><?php echo esc_html($baggage); ?></p>
    </div>

</div>

<div class="flight-content">

    <h2>Flight Overview</h2>

    <p><?php echo nl2br(esc_html($overview)); ?></p>

    <h2>Refund Policy</h2>

    <p><?php echo nl2br(esc_html($refund)); ?></p>

    <a href="<?php echo esc_url($book); ?>" class="flight-book-btn">
        Book Flight
    </a>

</div>
<?php endwhile; ?>

<?php get_footer(); ?>