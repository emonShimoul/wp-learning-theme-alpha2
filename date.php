<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>

<div class="posts text-center">
    <h1>
        Posts In - 
        <?php
        if(is_month()){
            $month = esc_html(get_query_var("monthnum"));
            $dateobj = DateTime::createFromFormat("!m",$month);
            echo $dateobj->format("F");
        } else if(is_year()){
            echo esc_html(get_query_var("year"));
        } else if(is_day()){
            $month = esc_html(get_query_var("monthnum"));
            $year = esc_html(get_query_var("year"));
            $day = esc_html(get_query_var("day"));
            printf("%s/%s/%s", $day,$month,$year);
            // echo get_query_var("day"),"/".get_query_var("monthnum")."/".get_query_var("year");
        }
        ?>
    </h1>
    <?php
    while(have_posts()){
        the_post();
        ?>
        <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
        <?php
    }
    ?>
    
    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                    the_posts_pagination( array(
                        "screen_reader_text"=>' ',
                        "prev_text"=>"New Posts",
                        "next_text"=>"Old Posts"
                    ) );
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>