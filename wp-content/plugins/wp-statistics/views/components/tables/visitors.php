<?php 
use WP_STATISTICS\Admin_Template;
use WP_STATISTICS\Referred;
use WP_STATISTICS\Helper;
use WP_STATISTICS\Country;
use WP_STATISTICS\Menus;
use WP_STATISTICS\Visitor;
use WP_Statistics\Components\View;

$linksTarget = !empty($open_links_in_new_tab) ? '_blank' : '';
?>

<div class="inside">
    <?php if (!empty($data)) : ?>
        <div class="o-table-wrapper">
            <table width="100%" class="o-table wps-new-table">
                <thead>
                    <tr>
                        <th class="wps-pd-l">
                            <span class="wps-order"><?php esc_html_e('Last View', 'wp-statistics'); ?></span>
                        </th>
                        <th class="wps-pd-l">
                            <?php esc_html_e('Visitor Information', 'wp-statistics'); ?>
                        </th>
                        <th class="wps-pd-l">
                            <?php esc_html_e('Location', 'wp-statistics'); ?>
                        </th>
                        <th class="wps-pd-l">
                            <?php esc_html_e('Referrer', 'wp-statistics'); ?>
                        </th>
                        <th class="wps-pd-l">
                            <?php esc_html_e('Total Views', 'wp-statistics'); ?>
                        </th>
                        <?php if (empty($hide_latest_page_column)) : ?>
                            <th class="wps-pd-l">
                                <?php echo isset($page_column_title) ? esc_html($page_column_title) : esc_html__('Latest Page', 'wp-statistics'); ?>
                            </th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $visitor) :  
                        $page = Visitor::get_page_by_id($visitor->page_id);
                    ?>
                        <tr>
                            <td class="wps-pd-l"><?php echo esc_html(date_i18n(Helper::getDefaultDateFormat(true, true, false, ', '), strtotime($visitor->date))); ?></td>

                            <td class="wps-pd-l">
                                <?php
                                View::load("components/visitor-information", ['visitor' => $visitor]);
                                ?>
                            </td>

                            <td class="wps-pd-l">
                                <div class="wps-country-flag wps-ellipsis-parent">
                                    <a target="<?php echo esc_attr($linksTarget); ?>" href="<?php echo esc_url(Menus::admin_url('geographic', ['type' => 'single-country', 'country' => $visitor->location])) ?>" class="wps-tooltip" title="<?php echo esc_attr(Country::getName($visitor->location)) ?>">
                                        <img src="<?php echo esc_url(Country::flag($visitor->location)) ?>" alt="<?php echo esc_attr(Country::getName($visitor->location)) ?>" width="15" height="15">
                                    </a>
                                    <?php $location = Admin_Template::locationColumn($visitor->location, $visitor->region, $visitor->city); ?>
                                    <span class="wps-ellipsis-text" title="<?php echo esc_attr($location) ?>"><?php echo esc_html($location) ?></span>
                                </div>
                            </td>

                            <td class="wps-pd-l">
                                <?php echo Referred::get_referrer_link($visitor->referred, '', true); ?>
                            </td>

                            <td class="wps-pd-l">
                                <a target="<?php echo esc_attr($linksTarget); ?>" href="<?php echo esc_url(Menus::admin_url('visitors', ['type' => 'single-visitor', 'visitor_id' => $visitor->ID])) ?>"><?php echo esc_html(number_format_i18n($visitor->hits)) ?></a>
                            </td>

                            <?php if (empty($hide_latest_page_column)) : ?>
                                <td class="wps-pd-l">
                                    <?php if (!empty($page)) : ?>
                                        <a target="_blank" href="<?php echo esc_url($page['link']) ?>" title="<?php echo esc_attr($page['title']) ?>" class="wps-link-arrow">
                                            <span><?php echo esc_html($page['title']) ?></span>
                                        </a>
                                    <?php else : ?>
                                        <?php echo Admin_Template::UnknownColumn() ?>
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="o-wrap o-wrap--no-data wps-center">
            <?php esc_html_e('No recent data available.', 'wp-statistics') ?>
        </div>
    <?php endif; ?>
</div>
<?php echo isset($pagination) ? $pagination : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
?>