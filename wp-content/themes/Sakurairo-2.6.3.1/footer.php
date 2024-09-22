<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sakura
 */

$reception_background = iro_opt('reception_background'); // 获取接待背景选项
?>
	</div><!-- #content -->
	<?php 
			comments_template('', true); // 调用评论模板 
	?>
</div><!-- #page Pjax container-->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info" theme-info="Sakurairo v<?php echo IRO_VERSION; ?>">
			<div class="footertext">
				<div class="img-preload">
					<img alt="loading_svg" src="<?php echo iro_opt('load_nextpage_svg'); ?>"><!-- 加载下一部分圈圈图像 -->
				</div>
				<div class="sakura-icon" style="width:max-content;height:max-content;margin: auto;">
				<svg width="30px" height="30px" t="1682340134496" class="sakura-svg" viewBox="0 0 1049 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5240">
                    <!-- Sakura 样式的 SVG 图标 -->
                    <path d="M525.58396628 573.34694353s268.83106938-2.62915481 309.36387092 193.24287089l-76.46458293 21.90962291 12.92667757 84.13295086a214.05701289 214.05701289 0 0 1-96.84053193-4.82011663A224.79272784 224.79272784 0 0 1 525.58396628 578.38615666z" fill="#EE9ca7" p-id="5241"></path>
                    <!-- ... (省略了其他 path 数据，保持原样) -->
                </svg>
				</div>

				<!-- 插入运行时间和版权信息的容器 -->
				<div class="footer-container" style="text-align: center; margin-top: 20px;"> <!-- 增加居中对齐 -->
					<!-- 插入运行时间显示代码 -->
					<div id="runtime" style="font-size: 14px; color: #fff; margin-bottom: 10px;">
					</div>

					<!-- 版权信息 -->
					<p style="color: #b9b9b9; margin: 10px 0;">
						Copyright © 2024 by Kyomu All Rights Reserved.
					</p>

					<!-- ICP备案号，放在新的一行，间距调整 -->
					<p style="color: #b9b9b9; margin: 10px 0;"> 
						<a href="https://icp.gov.moe/?keyword=20247727" target="_blank" style="color: #fff; text-decoration: none;">
							萌ICP备20247727号
						</a>
					</p>

					<!-- 插入总访问量和总访客数 -->
					<p style="color: #b9b9b9; margin: 10px 0;">
						总访问量: <?php echo wp_statistics_pages( 'total' ); ?> | 总访客数: <?php echo wp_statistics_visitor( 'total' ); ?>
					</p>

					<!-- 页脚其他信息，间距调整 -->
					<p style="color: #b9b9b9; margin: 10px 0;">
						<?php if (iro_opt('footer_load_occupancy', 'true')): ?>
	                        <?php printf(
	                            _x( '加载耗时 %.3f 秒 | 查询 %d 次 | 内存使用 %.2f MB ', 'footer load occupancy', 'sakurairo' ),
	                            timer_stop( 0, 3 ),get_num_queries(),memory_get_peak_usage() / 1024 / 1024);
	                        ?>
                        <?php endif; ?>
					</p>
				</div>

				<script>
				    function updateRuntime() {
				        const startTime = new Date("2024-09-07T00:24:00"); // 网站运行的开始时间
				        const now = new Date(); // 当前时间
				        const diff = now - startTime; // 计算时间差

				        const days = Math.floor(diff / (1000 * 60 * 60 * 24)); // 天数
				        const hours = Math.floor((diff / (1000 * 60 * 60)) % 24); // 小时
				        const minutes = Math.floor((diff / (1000 * 60)) % 60); // 分钟
				        const seconds = Math.floor((diff / 1000) % 60); // 秒

				        document.getElementById("runtime").innerHTML =
				            `本站已稳定运行: <span style="color: #ffb7c5;">${days}天 ${hours}小时 ${minutes}分钟 ${seconds}秒</span>`; // 显示运行时间
				    }

				    setInterval(updateRuntime, 1000); // 每1秒更新一次运行时间
				    updateRuntime(); // 初次加载运行时间
				</script>

			</div>
			<div class="footer-device function_area">
					<?php if(iro_opt('footer_yiyan')){ ?>
						<p id="footer_yiyan"></p> <!-- 显示“易言” -->
						<?php } ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</section><!-- #section -->
	<!-- m-nav-center -->
	<div id="mo-nav">
		<div class="m-avatar">
			<?php 
			$personal_avatar = iro_opt('personal_avatar'); // 获取用户头像选项
			$iro_logo = iro_opt('iro_logo'); // 获取站点Logo
			$ava = iro_opt('personal_avatar') ? $personal_avatar: ($iro_logo ?: iro_opt('vision_resource_basepath','https://s.nmxc.ltd/sakurairo_vision/@2.6/').'series/avatar.webp'); // 设置默认头像
			?>
			<img alt="m-avatar" src="<?php echo $ava ?>"> <!-- 显示头像 -->
		</div>
		<div class="m-search">
			<form class="m-search-form" method="get" action="<?php echo home_url(); ?>" role="search">
				<input class="m-search-input" type="search" name="s" placeholder="<?php _e('Search...', 'sakurairo') /*搜索...*/?>" required> <!-- 搜索框 -->
			</form>
		</div>
		<?php wp_nav_menu( array( 'depth' => 2, 'theme_location' => 'primary', 'container' => false ) ); ?> <!-- 显示主导航菜单 -->
	</div><!-- m-nav-center end -->
	<button id="moblieGoTop" title="<?=__('Go to top','sakurairo');?>"><i class="fa-solid fa-caret-up fa-lg"></i></button> <!-- 返回顶部按钮 -->
    <button id="changskin" title="<?=__('Control Panel','sakurairo');?>" ><i class="fa-solid fa-compass-drafting fa-lg fa-flip" style="--fa-animation-duration: 3s;"></i></button> <!-- 更换主题皮肤按钮 -->
	<!-- search start -->
	<form class="js-search search-form search-form--modal" method="get" action="<?php echo home_url(); ?>" role="search">
		<div class="search-form__inner">
		<?php if(iro_opt('live_search')){ ?>
			<div class="micro">
				<input id="search-input" class="text-input" type="search" name="s" placeholder="<?php _e('Want to find something?', 'sakurairo') /*想要找点什么呢*/?>" required> <!-- 实时搜索框 -->
			</div>
			<div class="ins-section-wrapper">
                <a id="Ty" href="#"></a>
                <div class="ins-section-container" id="PostlistBox"></div>
            </div>
		<?php }else{ ?>
			<div class="micro">
				<p class="micro mb-"><?php _e('Want to find something?', 'sakurairo') /*想要找点什么呢*/?></p>
				<input class="text-input" type="search" name="s" placeholder="<?php _e('Search', 'sakurairo') ?>" required> <!-- 搜索框 -->
			</div>
		<?php } ?>
		</div>
		<div class="search_close"></div>
	</form>
	<!-- search end -->
<?php wp_footer(); ?>
<div class="skin-menu no-select">
<?php if (iro_opt('sakura_widget')) : ?>
	<aside id="iro-widget" class="widget-area" role="complementary">
    <div class="sakura_widget">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sakura_widget')) : endif; ?> <!-- 显示侧边栏挂件 -->
	</div>
  </aside>
<?php endif; ?>
        <?php if (iro_opt('widget_shuo', 'true')) : ?>    
        <?php
            $args = array(
                    'post_type' => 'shuoshuo',
                    'post_status' => 'publish',
                    'posts_per_page' => 1
                    ); // 查询“说说”内容
            $shuoshuo_query = new WP_Query($args);
        ?>
        <?php while ($shuoshuo_query->have_posts()) : $shuoshuo_query->the_post(); ?>
            <div class="footer-shuo">
            <p><?php echo strip_tags(get_the_content()); ?></p> <!-- 显示“说说”内容 -->
			<p class="footer-shuotime"><i class="fa-regular fa-clock"></i> <?php the_time('Y/n/j G:i'); ?></p> <!-- 显示“说说”时间 -->
            </div>
        <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>  
  <div class="theme-controls row-container">
  <?php if (iro_opt('widget_daynight', 'true')): ?>
    <ul class="menu-list">
      <li id="white-bg" title="<?=__('Light Mode','sakurairo');?>" >
        <i class="fa-solid fa-display fa-sm"></i> <!-- 白天模式按钮 -->
      </li><!-- Default -->
      <li id="dark-bg" title="<?=__('Dark Mode','sakurairo');?>" >
        <i class="fa-regular fa-moon"></i> <!-- 夜间模式按钮 -->
      </li><!-- Night -->
    </ul>
  <?php endif; ?>
  <?php if(array_search(1, $reception_background) !== false): ?>
	<ul class="menu-list" title="<?=__('Toggle Page Background Image','sakurairo');?>">
	  <?php
      $bgIcons = [
        ['heart_shaped', 'fa-regular fa-heart', 'diy1-bg'],
        ['star_shaped', 'fa-regular fa-star', 'diy2-bg'],
        ['square_shaped', 'fa-brands fa-delicious', 'diy3-bg'],
        ['lemon_shaped', 'fa-regular fa-lemon', 'diy4-bg']
      ]; // 页面背景图标

      foreach ($bgIcons as $bgIcon) {
        if ($reception_background[$bgIcon[0]] == '1') {
          echo '<li id="' . $bgIcon[2] . '">';
          echo '<i class="' . $bgIcon[1] . '"></i>';
          echo '</li>';
        }
      }
      ?>
  </ul>
  <?php endif; ?>
  <?php if (iro_opt('widget_font', 'true')): ?>  
	<div class="font-family-controls row-container">
    <button type="button" class="control-btn-serif selected" title="<?=__('Switch To Font A','sakurairo');?>" data-name="serif">
      <i class="fa-solid fa-font fa-lg"></i> <!-- 切换字体A -->
    </button>
    <button type="button" class="control-btn-sans-serif" title="<?=__('Switch To Font B','sakurairo');?>" data-name="sans-serif">
      <i class="fa-solid fa-bold fa-lg"></i> <!-- 切换字体B -->
    </button>
  </div>
  <?php endif; ?>
  </div>
</div>
<?php if (iro_opt('aplayer_server') != 'off'): ?>
    <div id="aplayer-float" style="z-index: 100;"
	    class="aplayer"
        data-id="<?php echo iro_opt('aplayer_playlistid', ''); ?>"
        data-server="<?php echo iro_opt('aplayer_server'); ?>"
		data-preload="<?php echo iro_opt('aplayer_preload'); ?>"
        data-type="playlist"
        data-fixed="true"
		data-order="<?php echo iro_opt('aplayer_order'); ?>"
        data-volume="<?php echo iro_opt('aplayer_volume', ''); ?>"
        data-theme="<?php echo iro_opt('theme_skin'); ?>">
    </div> <!-- Aplayer 音乐播放器 -->
<?php endif; ?>

<!-- 首页波浪特效 -->
<?php if (iro_opt('wave_effects', 'true')): ?>
<link rel="stylesheet" href="<?php global $shared_lib_basepath;echo $shared_lib_basepath?>/css/wave.css"> <!-- 加载波浪效果CSS -->
<?php endif; ?>

<?php
echo iro_opt('footer_addition', ''); // 插入自定义页脚附加代码
?>
</body>
<!-- Particles动效 -->
<?php if (iro_opt('particles_effects', 'true')): ?>
<style>
  #particles-js {
  width: 100%;
  height: 100%;
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: -1;
}
</style>
<div id="particles-js"></div>
<script type="application/json" id="particles-js-cfg"><?=iro_opt('particles_json','')?></script> <!-- 加载Particles动效 -->
<?php endif; ?>
</html>
