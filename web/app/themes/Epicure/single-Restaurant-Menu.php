<?php get_header(); ?>

<?php while(have_posts()):the_post(); ?>
<?php $chef=get_field('main_chef')[0];?>
    <div class="resContainer">
    <div class="res-Thumnail" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">

        </div>
        <div class="resDetails">
            <h1><?php the_title(); ?></h1>
            <p><?php echo $chef->post_title; ?></p>
            <p class="openTime"><?php 
                  $open=strtotime(get_field('open_time'));
                  $close=strtotime(get_field('closing_time'));
                  $current=strtotime(date('H:i'));
                if($open<=$current && $current<=$close){?>
               
                <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: sketchtool 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                    
                    <g id="Home-page---desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="desktop---claro" transform="translate(-663.000000, -612.000000)" fill="#000000" fill-rule="nonzero">
                            <g id="Group-4" transform="translate(663.000000, 612.190000)">
                                <g id="np_clock_2120466_000000">
                                    <path d="M8.5,3.39304115e-16 C3.80838202,3.39304115e-16 0,3.80838202 0,8.5 C0,13.191618 3.80838202,17 8.5,17 C13.191618,17 17,13.191618 17,8.5 C17,3.80838202 13.191618,0 8.5,3.39304115e-16 Z M8.5,0.405898876 C12.9753933,0.405898876 16.6000225,4.02460674 16.6000225,8.5 C16.6000225,12.9753933 12.9752022,16.6000225 8.5,16.6000225 C4.02479775,16.6000225 0.399977528,12.9752022 0.399977528,8.5 C0.399977528,4.02460674 4.02479775,0.405898876 8.5,0.405898876 Z M11.8008652,6.18991011 C11.7769888,6.19587921 11.755351,6.20632504 11.7352051,6.21975562 L8.47617135,8.20741854 L8.45229494,8.21935674 C8.4485643,8.22084892 8.44408738,8.22308738 8.44035674,8.22532584 C8.43811828,8.22681802 8.4366261,8.22905648 8.43438764,8.23129494 C8.43214918,8.23278712 8.430657,8.23502558 8.42841854,8.23726404 C8.42618008,8.23875622 8.4246879,8.24099469 8.42244944,8.24323315 C8.4187188,8.24696379 8.41424188,8.25069443 8.41051124,8.25517135 C8.40827278,8.25666353 8.4067806,8.25890199 8.40454213,8.26039436 C8.40230367,8.26263263 8.40081149,8.26487109 8.39857303,8.26636346 C8.39633457,8.27084019 8.39484239,8.27457083 8.39260393,8.27830166 C8.39036547,8.28053993 8.38887329,8.2820323 8.38663483,8.28427076 C8.38439637,8.28650903 8.38290419,8.2880014 8.38066573,8.29023987 L8.38066573,8.30217807 C8.37842727,8.30441634 8.37693509,8.30590871 8.37469663,8.30814717 C8.37245817,8.31187781 8.37096599,8.31560845 8.36872753,8.32008537 C8.36648907,8.32381601 8.36499689,8.32754665 8.36275843,8.33202357 L8.36275843,8.33799267 L8.36275843,8.3491846 C8.36051997,8.35142306 8.35902779,8.35366152 8.35678933,8.3551537 L8.35678933,8.3670919 L8.35678933,8.3790301 L8.35678933,8.3849992 L8.35678933,8.3909683 C8.35604324,8.40290651 8.35604324,8.41484471 8.35678933,8.42678291 L8.35678933,14.3660863 C8.3523124,14.4220468 8.37171208,14.4772606 8.40976438,14.5182993 C8.44781764,14.5593362 8.5007927,14.5824676 8.55675326,14.5824676 C8.61271382,14.5824676 8.66643573,14.5593381 8.70448899,14.5182993 C8.74179539,14.4772625 8.7611964,14.4220468 8.7567191,14.3660863 L8.7567191,8.50433347 L11.9443146,6.558311 C12.0308656,6.50906639 12.0681739,6.40386122 12.0323593,6.31133347 C11.9965447,6.21881336 11.8980536,6.16583639 11.8010638,6.188221 L11.8008652,6.18991011 Z" id="clock-icon"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg> Open Now
                <?php } else{ ?>
                    Closed
               <?php  } ?>
              </p>
        </div>

        
        <div class="res-Dishes">

    <div id="dishes" data-id="<?php echo $post -> ID ?>">
        <?php 
        
        while(have_rows('serving_times')): the_row(); 

            $serving_Times=get_field('serving_times', $post -> ID);

            foreach($serving_Times as $time =>$t){
                $key=array_search($time,$serving_Times);
                if(null!==get_sub_field($time) && get_sub_field($time)!==''){
                
                if($time=='lunch_dishes'){?>
                  <button id="<?php echo $time;  ?>" class="dishes-cat" onclick="sendAjax('<?php echo $time ?>',<?php echo $key+1 ?>, <?php echo $post -> ID ?>)">
                  <?php 
                     echo 'Lunch'; ?>
                  </button>
  
                   <?php } else{  ?>
                      <button id="<?php echo $time;  ?>" class="dishes-cat" onclick="sendAjax('<?php echo $time ?>',<?php echo $key+1 ?>, <?php echo $post -> ID ?>)">
                          <?php 
                              $timeBig=ucfirst($time);
                              echo trim($timeBig,'_dishes'); ?>
                      </button>
                  <?php   } 

                  
                    
               }
            
               
            }

        ?>
            </div>
            <ul class="theDishes">
            <?php 
            if(get_sub_field('breakfast_dishes')){
                $args='breakfast_dishes';
                set_query_var( 'the_dish', $args );
                get_template_part( 'template-parts/page','dishRes' );
            } 
            elseif(get_sub_field('lunch_dishes')) {
                $args='lunch_dishes';
                set_query_var( 'the_dish', $args );
                get_template_part( 'template-parts/page','dishRes' );
            }
            elseif(get_sub_field('dinner_dishes')){
                $args='dinner_dishes';
                set_query_var( 'the_dish', $args );
                get_template_part( 'template-parts/page','dishRes' );
            }
            ?>
            </ul>

       <?php  endwhile; ?>
        


        
      
        
       


<?php endwhile; ?>
<?php get_footer(); ?>