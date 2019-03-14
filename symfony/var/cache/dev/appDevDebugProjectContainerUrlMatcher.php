<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request;
        $requestMethod = $canonicalMethod = $context->getMethod();
        $scheme = $context->getScheme();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }


        if (0 === strpos($pathinfo, '/js/jquery')) {
            // _assetic_jquery_js
            if ('/js/jquery.min.js' === $pathinfo) {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'jquery_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_jquery_js',);
            }

            // _assetic_jquery_js_0
            if ('/js/jquery.min_jquery.min_1.js' === $pathinfo) {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'jquery_js',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_jquery_js_0',);
            }

            // _assetic_jquery_ui_js
            if ('/js/jquery-ui.min.js' === $pathinfo) {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'jquery_ui_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_jquery_ui_js',);
            }

            // _assetic_jquery_ui_js_0
            if ('/js/jquery-ui.min_jquery-ui.min_1.js' === $pathinfo) {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'jquery_ui_js',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_jquery_ui_js_0',);
            }

        }

        elseif (0 === strpos($pathinfo, '/js/b')) {
            // _assetic_bootstrap_js
            if ('/js/bootstrap.js' === $pathinfo) {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js',);
            }

            if (0 === strpos($pathinfo, '/js/bootstrap_')) {
                // _assetic_bootstrap_js_0
                if ('/js/bootstrap_affix_1.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_0',);
                }

                // _assetic_bootstrap_js_1
                if ('/js/bootstrap_alert_2.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_1',);
                }

                // _assetic_bootstrap_js_2
                if ('/js/bootstrap_button_3.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_2',);
                }

                // _assetic_bootstrap_js_3
                if ('/js/bootstrap_carousel_4.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_3',);
                }

                // _assetic_bootstrap_js_4
                if ('/js/bootstrap_collapse_5.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_4',);
                }

                // _assetic_bootstrap_js_5
                if ('/js/bootstrap_dropdown_6.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 5,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_5',);
                }

                // _assetic_bootstrap_js_6
                if ('/js/bootstrap_modal_7.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 6,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_6',);
                }

                if (0 === strpos($pathinfo, '/js/bootstrap_t')) {
                    // _assetic_bootstrap_js_7
                    if ('/js/bootstrap_tooltip_8.js' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 7,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_7',);
                    }

                    // _assetic_bootstrap_js_10
                    if ('/js/bootstrap_tab_11.js' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 10,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_10',);
                    }

                    // _assetic_bootstrap_js_11
                    if ('/js/bootstrap_transition_12.js' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 11,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_11',);
                    }

                }

                // _assetic_bootstrap_js_8
                if ('/js/bootstrap_popover_9.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 8,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_8',);
                }

                // _assetic_bootstrap_js_9
                if ('/js/bootstrap_scrollspy_10.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 9,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_9',);
                }

            }

            // _assetic_b08e66b
            if ('/js/b08e66b.js' === $pathinfo) {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'b08e66b',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_b08e66b',);
            }

            if (0 === strpos($pathinfo, '/js/b08e66b_')) {
                // _assetic_b08e66b_0
                if ('/js/b08e66b_jquery.min_1.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'b08e66b',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_b08e66b_0',);
                }

                // _assetic_b08e66b_1
                if ('/js/b08e66b_jquery-ui.min_2.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'b08e66b',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_b08e66b_1',);
                }

                // _assetic_b08e66b_2
                if ('/js/b08e66b_bootstrap_3.js' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'b08e66b',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_b08e66b_2',);
                }

            }

        }

        elseif (0 === strpos($pathinfo, '/c')) {
            if (0 === strpos($pathinfo, '/css')) {
                // _assetic_bootstrap_css
                if ('/css/bootstrap.css' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_css',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_bootstrap_css',);
                }

                // _assetic_bootstrap_css_0
                if ('/css/bootstrap_bootstrap_1.css' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_css',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_bootstrap_css_0',);
                }

                // _assetic_font_awesome_css
                if ('/css/font-awesome.css' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_css',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_font_awesome_css',);
                }

                // _assetic_font_awesome_css_0
                if ('/css/font-awesome_font-awesome_1.css' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_css',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_font_awesome_css_0',);
                }

                // _assetic_71a0a47
                if ('/css/71a0a47.css' === $pathinfo) {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '71a0a47',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_71a0a47',);
                }

                if (0 === strpos($pathinfo, '/css/71a0a47_')) {
                    // _assetic_71a0a47_0
                    if ('/css/71a0a47_layout_1.css' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '71a0a47',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_71a0a47_0',);
                    }

                    // _assetic_71a0a47_1
                    if ('/css/71a0a47_bootstrap_2.css' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '71a0a47',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_71a0a47_1',);
                    }

                    // _assetic_71a0a47_2
                    if ('/css/71a0a47_font-awesome_3.css' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '71a0a47',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_71a0a47_2',);
                    }

                }

                elseif (0 === strpos($pathinfo, '/css/11e4efa')) {
                    // _assetic_11e4efa
                    if ('/css/11e4efa.css' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '11e4efa',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_11e4efa',);
                    }

                    // _assetic_11e4efa_0
                    if ('/css/11e4efa_bootstrap_1.css' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '11e4efa',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_11e4efa_0',);
                    }

                    // _assetic_11e4efa_1
                    if ('/css/11e4efa_font-awesome_2.css' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '11e4efa',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_11e4efa_1',);
                    }

                }

            }

            elseif (0 === strpos($pathinfo, '/check-email')) {
                // fr__RG__fos_user_registration_check_email
                if ('/check-email' === $pathinfo) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_fr__RG__fos_user_registration_check_email;
                    }

                    return array (  '_controller' => 'fos_user.registration.controller:checkEmailAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_registration_check_email',);
                }
                not_fr__RG__fos_user_registration_check_email:

                // fr__RG__fos_user_resetting_check_email
                if ('/check-email' === $pathinfo) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_fr__RG__fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'fos_user.resetting.controller:checkEmailAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_resetting_check_email',);
                }
                not_fr__RG__fos_user_resetting_check_email:

            }

            // fr__RG__fos_user_change_password
            if ('/change-password' === $pathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_fr__RG__fos_user_change_password;
                }

                return array (  '_controller' => 'fos_user.change_password.controller:changePasswordAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_change_password',);
            }
            not_fr__RG__fos_user_change_password:

            if (0 === strpos($pathinfo, '/confirm')) {
                // fr__RG__fos_user_registration_confirm
                if (preg_match('#^/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_fr__RG__fos_user_registration_confirm;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fr__RG__fos_user_registration_confirm')), array (  '_controller' => 'fos_user.registration.controller:confirmAction',  '_locale' => 'fr',));
                }
                not_fr__RG__fos_user_registration_confirm:

                // fr__RG__fos_user_registration_confirmed
                if ('/confirmed' === $pathinfo) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_fr__RG__fos_user_registration_confirmed;
                    }

                    return array (  '_controller' => 'fos_user.registration.controller:confirmedAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_registration_confirmed',);
                }
                not_fr__RG__fos_user_registration_confirmed:

            }

        }

        elseif (0 === strpos($pathinfo, '/f')) {
            if (0 === strpos($pathinfo, '/fonts')) {
                if (0 === strpos($pathinfo, '/fonts/glyphicons-halflings-regular.')) {
                    // _assetic_fonts_glyphicons_eot
                    if ('/fonts/glyphicons-halflings-regular.eot' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_eot',  'pos' => NULL,  '_format' => 'eot',  '_route' => '_assetic_fonts_glyphicons_eot',);
                    }

                    // _assetic_fonts_glyphicons_svg
                    if ('/fonts/glyphicons-halflings-regular.svg' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_svg',  'pos' => NULL,  '_format' => 'svg',  '_route' => '_assetic_fonts_glyphicons_svg',);
                    }

                    // _assetic_fonts_glyphicons_ttf
                    if ('/fonts/glyphicons-halflings-regular.ttf' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_ttf',  'pos' => NULL,  '_format' => 'ttf',  '_route' => '_assetic_fonts_glyphicons_ttf',);
                    }

                    if (0 === strpos($pathinfo, '/fonts/glyphicons-halflings-regular.woff')) {
                        // _assetic_fonts_glyphicons_woff
                        if ('/fonts/glyphicons-halflings-regular.woff' === $pathinfo) {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_woff',  'pos' => NULL,  '_format' => 'woff',  '_route' => '_assetic_fonts_glyphicons_woff',);
                        }

                        // _assetic_fonts_glyphicons_woff2
                        if ('/fonts/glyphicons-halflings-regular.woff2' === $pathinfo) {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_woff2',  'pos' => NULL,  '_format' => 'woff2',  '_route' => '_assetic_fonts_glyphicons_woff2',);
                        }

                    }

                }

                elseif (0 === strpos($pathinfo, '/fonts/glyphicons-halflings-regular_glyphicons-halflings-regular_1.')) {
                    // _assetic_fonts_glyphicons_eot_0
                    if ('/fonts/glyphicons-halflings-regular_glyphicons-halflings-regular_1.eot' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_eot',  'pos' => 0,  '_format' => 'eot',  '_route' => '_assetic_fonts_glyphicons_eot_0',);
                    }

                    // _assetic_fonts_glyphicons_svg_0
                    if ('/fonts/glyphicons-halflings-regular_glyphicons-halflings-regular_1.svg' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_svg',  'pos' => 0,  '_format' => 'svg',  '_route' => '_assetic_fonts_glyphicons_svg_0',);
                    }

                    // _assetic_fonts_glyphicons_ttf_0
                    if ('/fonts/glyphicons-halflings-regular_glyphicons-halflings-regular_1.ttf' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_ttf',  'pos' => 0,  '_format' => 'ttf',  '_route' => '_assetic_fonts_glyphicons_ttf_0',);
                    }

                    if (0 === strpos($pathinfo, '/fonts/glyphicons-halflings-regular_glyphicons-halflings-regular_1.woff')) {
                        // _assetic_fonts_glyphicons_woff_0
                        if ('/fonts/glyphicons-halflings-regular_glyphicons-halflings-regular_1.woff' === $pathinfo) {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_woff',  'pos' => 0,  '_format' => 'woff',  '_route' => '_assetic_fonts_glyphicons_woff_0',);
                        }

                        // _assetic_fonts_glyphicons_woff2_0
                        if ('/fonts/glyphicons-halflings-regular_glyphicons-halflings-regular_1.woff2' === $pathinfo) {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'fonts_glyphicons_woff2',  'pos' => 0,  '_format' => 'woff2',  '_route' => '_assetic_fonts_glyphicons_woff2_0',);
                        }

                    }

                }

                elseif (0 === strpos($pathinfo, '/fonts/fontawesome-webfont.')) {
                    // _assetic_font_awesome_fonts_eot
                    if ('/fonts/fontawesome-webfont.eot' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_eot',  'pos' => NULL,  '_format' => 'eot',  '_route' => '_assetic_font_awesome_fonts_eot',);
                    }

                    // _assetic_font_awesome_fonts_svg
                    if ('/fonts/fontawesome-webfont.svg' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_svg',  'pos' => NULL,  '_format' => 'svg',  '_route' => '_assetic_font_awesome_fonts_svg',);
                    }

                    // _assetic_font_awesome_fonts_ttf
                    if ('/fonts/fontawesome-webfont.ttf' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_ttf',  'pos' => NULL,  '_format' => 'ttf',  '_route' => '_assetic_font_awesome_fonts_ttf',);
                    }

                    if (0 === strpos($pathinfo, '/fonts/fontawesome-webfont.woff')) {
                        // _assetic_font_awesome_fonts_woff
                        if ('/fonts/fontawesome-webfont.woff' === $pathinfo) {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_woff',  'pos' => NULL,  '_format' => 'woff',  '_route' => '_assetic_font_awesome_fonts_woff',);
                        }

                        // _assetic_font_awesome_fonts_woff2
                        if ('/fonts/fontawesome-webfont.woff2' === $pathinfo) {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_woff2',  'pos' => NULL,  '_format' => 'woff2',  '_route' => '_assetic_font_awesome_fonts_woff2',);
                        }

                    }

                }

                elseif (0 === strpos($pathinfo, '/fonts/fontawesome-webfont_fontawesome-webfont_1.')) {
                    // _assetic_font_awesome_fonts_eot_0
                    if ('/fonts/fontawesome-webfont_fontawesome-webfont_1.eot' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_eot',  'pos' => 0,  '_format' => 'eot',  '_route' => '_assetic_font_awesome_fonts_eot_0',);
                    }

                    // _assetic_font_awesome_fonts_svg_0
                    if ('/fonts/fontawesome-webfont_fontawesome-webfont_1.svg' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_svg',  'pos' => 0,  '_format' => 'svg',  '_route' => '_assetic_font_awesome_fonts_svg_0',);
                    }

                    // _assetic_font_awesome_fonts_ttf_0
                    if ('/fonts/fontawesome-webfont_fontawesome-webfont_1.ttf' === $pathinfo) {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_ttf',  'pos' => 0,  '_format' => 'ttf',  '_route' => '_assetic_font_awesome_fonts_ttf_0',);
                    }

                    if (0 === strpos($pathinfo, '/fonts/fontawesome-webfont_fontawesome-webfont_1.woff')) {
                        // _assetic_font_awesome_fonts_woff_0
                        if ('/fonts/fontawesome-webfont_fontawesome-webfont_1.woff' === $pathinfo) {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_woff',  'pos' => 0,  '_format' => 'woff',  '_route' => '_assetic_font_awesome_fonts_woff_0',);
                        }

                        // _assetic_font_awesome_fonts_woff2_0
                        if ('/fonts/fontawesome-webfont_fontawesome-webfont_1.woff2' === $pathinfo) {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'font_awesome_fonts_woff2',  'pos' => 0,  '_format' => 'woff2',  '_route' => '_assetic_font_awesome_fonts_woff2_0',);
                        }

                    }

                }

            }

            // fr__RG__yl_core_app_forgotPassword
            if ('/forgot-password' === $pathinfo) {
                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::forgotPasswordAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_forgotPassword',);
            }

            // fr__RG__yl_factory_homepage
            if ('/factory' === $trimmedPathinfo) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($rawPathinfo.'/', 'fr__RG__yl_factory_homepage');
                }

                return array (  '_controller' => 'YL\\FactoryBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_factory_homepage',);
            }

        }

        elseif (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($rawPathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        elseif (0 === strpos($pathinfo, '/en')) {
            // en__RG__yl_factory_homepage
            if ('/en/factory' === $trimmedPathinfo) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($rawPathinfo.'/', 'en__RG__yl_factory_homepage');
                }

                return array (  '_controller' => 'YL\\FactoryBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_factory_homepage',);
            }

            // en__RG__yl_core_app_homepage
            if ('/en' === $trimmedPathinfo) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($rawPathinfo.'/', 'en__RG__yl_core_app_homepage');
                }

                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_homepage',);
            }

            // en__RG__yl_core_app_myhome
            if ('/en/home' === $pathinfo) {
                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myHomeAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_myhome',);
            }

            if (0 === strpos($pathinfo, '/en/register')) {
                // en__RG__yl_core_app_register_choice
                if ('/en/register-choice' === $pathinfo) {
                    return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myRegisterChoiceAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_register_choice',);
                }

                // en__RG__yl_core_app_register
                if ('/en/register' === $pathinfo) {
                    return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myRegisterAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_register',);
                }

            }

            elseif (0 === strpos($pathinfo, '/en/my')) {
                // en__RG__yl_core_app_myLogin
                if ('/en/myLogin' === $pathinfo) {
                    return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myLoginAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_myLogin',);
                }

                // en__RG__yl_core_app_myProfileChauffeur
                if ('/en/my-profile-chauffeur' === $pathinfo) {
                    return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myProfileChauffeurAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_myProfileChauffeur',);
                }

                // en__RG__yl_core_app_myProfilePreteur
                if ('/en/my-profile-preteur' === $pathinfo) {
                    return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myProfilePreteurAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_myProfilePreteur',);
                }

            }

            // en__RG__yl_core_app_forgotPassword
            if ('/en/forgot-password' === $pathinfo) {
                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::forgotPasswordAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_forgotPassword',);
            }

            // en__RG__yl_core_app_ourDrivers
            if ('/en/our-drivers' === $pathinfo) {
                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::ourDriversAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_ourDrivers',);
            }

            // en__RG__yl_core_app_editProfile
            if ('/en/edit-profile' === $pathinfo) {
                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::editProfileAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_core_app_editProfile',);
            }

            if (0 === strpos($pathinfo, '/en/login')) {
                // en__RG__fos_user_security_login
                if ('/en/login' === $pathinfo) {
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_en__RG__fos_user_security_login;
                    }

                    return array (  '_controller' => 'fos_user.security.controller:loginAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_security_login',);
                }
                not_en__RG__fos_user_security_login:

                // en__RG__fos_user_security_check
                if ('/en/login_check' === $pathinfo) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_en__RG__fos_user_security_check;
                    }

                    return array (  '_controller' => 'fos_user.security.controller:checkAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_security_check',);
                }
                not_en__RG__fos_user_security_check:

            }

            // en__RG__fos_user_security_logout
            if ('/en/logout' === $pathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_en__RG__fos_user_security_logout;
                }

                return array (  '_controller' => 'fos_user.security.controller:logoutAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_security_logout',);
            }
            not_en__RG__fos_user_security_logout:

            // en__RG__fos_user_profile_show
            if ('/en' === $trimmedPathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_en__RG__fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($rawPathinfo.'/', 'en__RG__fos_user_profile_show');
                }

                return array (  '_controller' => 'fos_user.profile.controller:showAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_profile_show',);
            }
            not_en__RG__fos_user_profile_show:

            // en__RG__fos_user_profile_edit
            if ('/en/edit' === $pathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_en__RG__fos_user_profile_edit;
                }

                return array (  '_controller' => 'fos_user.profile.controller:editAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_profile_edit',);
            }
            not_en__RG__fos_user_profile_edit:

            // en__RG__fos_user_registration_register
            if ('/en' === $trimmedPathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_en__RG__fos_user_registration_register;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($rawPathinfo.'/', 'en__RG__fos_user_registration_register');
                }

                return array (  '_controller' => 'fos_user.registration.controller:registerAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_registration_register',);
            }
            not_en__RG__fos_user_registration_register:

            if (0 === strpos($pathinfo, '/en/c')) {
                if (0 === strpos($pathinfo, '/en/check-email')) {
                    // en__RG__fos_user_registration_check_email
                    if ('/en/check-email' === $pathinfo) {
                        if ('GET' !== $canonicalMethod) {
                            $allow[] = 'GET';
                            goto not_en__RG__fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'fos_user.registration.controller:checkEmailAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_registration_check_email',);
                    }
                    not_en__RG__fos_user_registration_check_email:

                    // en__RG__fos_user_resetting_check_email
                    if ('/en/check-email' === $pathinfo) {
                        if ('GET' !== $canonicalMethod) {
                            $allow[] = 'GET';
                            goto not_en__RG__fos_user_resetting_check_email;
                        }

                        return array (  '_controller' => 'fos_user.resetting.controller:checkEmailAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_resetting_check_email',);
                    }
                    not_en__RG__fos_user_resetting_check_email:

                }

                // en__RG__fos_user_change_password
                if ('/en/change-password' === $pathinfo) {
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_en__RG__fos_user_change_password;
                    }

                    return array (  '_controller' => 'fos_user.change_password.controller:changePasswordAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_change_password',);
                }
                not_en__RG__fos_user_change_password:

                if (0 === strpos($pathinfo, '/en/confirm')) {
                    // en__RG__fos_user_registration_confirm
                    if (preg_match('#^/en/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        if ('GET' !== $canonicalMethod) {
                            $allow[] = 'GET';
                            goto not_en__RG__fos_user_registration_confirm;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__fos_user_registration_confirm')), array (  '_controller' => 'fos_user.registration.controller:confirmAction',  '_locale' => 'en',));
                    }
                    not_en__RG__fos_user_registration_confirm:

                    // en__RG__fos_user_registration_confirmed
                    if ('/en/confirmed' === $pathinfo) {
                        if ('GET' !== $canonicalMethod) {
                            $allow[] = 'GET';
                            goto not_en__RG__fos_user_registration_confirmed;
                        }

                        return array (  '_controller' => 'fos_user.registration.controller:confirmedAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_registration_confirmed',);
                    }
                    not_en__RG__fos_user_registration_confirmed:

                }

            }

            // en__RG__fos_user_resetting_request
            if ('/en/request' === $pathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_en__RG__fos_user_resetting_request;
                }

                return array (  '_controller' => 'fos_user.resetting.controller:requestAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_resetting_request',);
            }
            not_en__RG__fos_user_resetting_request:

            // en__RG__fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/en/reset') && preg_match('#^/en/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_en__RG__fos_user_resetting_reset;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__fos_user_resetting_reset')), array (  '_controller' => 'fos_user.resetting.controller:resetAction',  '_locale' => 'en',));
            }
            not_en__RG__fos_user_resetting_reset:

            // en__RG__fos_user_resetting_send_email
            if ('/en/send-email' === $pathinfo) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_en__RG__fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'fos_user.resetting.controller:sendEmailAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_resetting_send_email',);
            }
            not_en__RG__fos_user_resetting_send_email:

            // en__RG__yl_company_homepage
            if ('/en/api/' === $pathinfo && ($request->attributes->get("version") == 1)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_en__RG__yl_company_homepage;
                }

                return array (  '_controller' => 'YL\\CompanyBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_route' => 'en__RG__yl_company_homepage',);
            }
            not_en__RG__yl_company_homepage:

        }

        elseif (0 === strpos($pathinfo, '/edit')) {
            // fr__RG__yl_core_app_editProfile
            if ('/edit-profile' === $pathinfo) {
                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::editProfileAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_editProfile',);
            }

            // fr__RG__fos_user_profile_edit
            if ('/edit' === $pathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_fr__RG__fos_user_profile_edit;
                }

                return array (  '_controller' => 'fos_user.profile.controller:editAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_profile_edit',);
            }
            not_fr__RG__fos_user_profile_edit:

        }

        // fr__RG__yl_core_app_homepage
        if ('' === $trimmedPathinfo) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($rawPathinfo.'/', 'fr__RG__yl_core_app_homepage');
            }

            return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_homepage',);
        }

        // fr__RG__yl_core_app_myhome
        if ('/home' === $pathinfo) {
            return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myHomeAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_myhome',);
        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fr__RG__yl_core_app_register_choice
                if ('/register-choice' === $pathinfo) {
                    return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myRegisterChoiceAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_register_choice',);
                }

                // fr__RG__yl_core_app_register
                if ('/register' === $pathinfo) {
                    return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myRegisterAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_register',);
                }

            }

            // fr__RG__fos_user_resetting_request
            if ('/request' === $pathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_fr__RG__fos_user_resetting_request;
                }

                return array (  '_controller' => 'fos_user.resetting.controller:requestAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_resetting_request',);
            }
            not_fr__RG__fos_user_resetting_request:

            // fr__RG__fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/reset') && preg_match('#^/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_fr__RG__fos_user_resetting_reset;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fr__RG__fos_user_resetting_reset')), array (  '_controller' => 'fos_user.resetting.controller:resetAction',  '_locale' => 'fr',));
            }
            not_fr__RG__fos_user_resetting_reset:

        }

        elseif (0 === strpos($pathinfo, '/my')) {
            // fr__RG__yl_core_app_myLogin
            if ('/myLogin' === $pathinfo) {
                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myLoginAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_myLogin',);
            }

            // fr__RG__yl_core_app_myProfileChauffeur
            if ('/my-profile-chauffeur' === $pathinfo) {
                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myProfileChauffeurAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_myProfileChauffeur',);
            }

            // fr__RG__yl_core_app_myProfilePreteur
            if ('/my-profile-preteur' === $pathinfo) {
                return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::myProfilePreteurAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_myProfilePreteur',);
            }

        }

        // fr__RG__yl_core_app_ourDrivers
        if ('/our-drivers' === $pathinfo) {
            return array (  '_controller' => 'YL\\CoreAppBundle\\Controller\\DefaultController::ourDriversAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_core_app_ourDrivers',);
        }

        if (0 === strpos($pathinfo, '/login')) {
            // fr__RG__fos_user_security_login
            if ('/login' === $pathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_fr__RG__fos_user_security_login;
                }

                return array (  '_controller' => 'fos_user.security.controller:loginAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_security_login',);
            }
            not_fr__RG__fos_user_security_login:

            // fr__RG__fos_user_security_check
            if ('/login_check' === $pathinfo) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_fr__RG__fos_user_security_check;
                }

                return array (  '_controller' => 'fos_user.security.controller:checkAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_security_check',);
            }
            not_fr__RG__fos_user_security_check:

        }

        // fr__RG__fos_user_security_logout
        if ('/logout' === $pathinfo) {
            if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                $allow = array_merge($allow, array('GET', 'POST'));
                goto not_fr__RG__fos_user_security_logout;
            }

            return array (  '_controller' => 'fos_user.security.controller:logoutAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_security_logout',);
        }
        not_fr__RG__fos_user_security_logout:

        // fr__RG__fos_user_profile_show
        if ('' === $trimmedPathinfo) {
            if ('GET' !== $canonicalMethod) {
                $allow[] = 'GET';
                goto not_fr__RG__fos_user_profile_show;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($rawPathinfo.'/', 'fr__RG__fos_user_profile_show');
            }

            return array (  '_controller' => 'fos_user.profile.controller:showAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_profile_show',);
        }
        not_fr__RG__fos_user_profile_show:

        // fr__RG__fos_user_registration_register
        if ('' === $trimmedPathinfo) {
            if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                $allow = array_merge($allow, array('GET', 'POST'));
                goto not_fr__RG__fos_user_registration_register;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($rawPathinfo.'/', 'fr__RG__fos_user_registration_register');
            }

            return array (  '_controller' => 'fos_user.registration.controller:registerAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_registration_register',);
        }
        not_fr__RG__fos_user_registration_register:

        // fr__RG__fos_user_resetting_send_email
        if ('/send-email' === $pathinfo) {
            if ('POST' !== $canonicalMethod) {
                $allow[] = 'POST';
                goto not_fr__RG__fos_user_resetting_send_email;
            }

            return array (  '_controller' => 'fos_user.resetting.controller:sendEmailAction',  '_locale' => 'fr',  '_route' => 'fr__RG__fos_user_resetting_send_email',);
        }
        not_fr__RG__fos_user_resetting_send_email:

        // fr__RG__yl_company_homepage
        if ('/api/' === $pathinfo && ($request->attributes->get("version") == 1)) {
            if ('POST' !== $canonicalMethod) {
                $allow[] = 'POST';
                goto not_fr__RG__yl_company_homepage;
            }

            return array (  '_controller' => 'YL\\CompanyBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'fr',  '_route' => 'fr__RG__yl_company_homepage',);
        }
        not_fr__RG__yl_company_homepage:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
