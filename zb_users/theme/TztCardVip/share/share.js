/**
 * Share.js
 *
 * @author  overtrue <i@overtrue.me>
 * @license MIT
 *
 * @example
 * <pre>
 * $('.share-components').share();
 *
 * // or
 *
 * $('.share-bar').share({
 *     sites: ['qzone', 'qq', 'weibo','wechat'],
 *     // ...
 * });
 * </pre>
 */
;(function($){
    /**
     * Initialize a share bar.
     *
     * @param {Object}        $options globals (optional).
     *
     * @return {Void}
     */
    $.fn.share = function ($options) {
        var $head = $(document.head);

        var $defaults = {
            url: location.href,
            site_url: location.origin,
            source: $head.find('[name=site], [name=Site]').attr('content') || document.title,
            title: $head.find('[name=title], [name=Title]').attr('content') || document.title,
            description: $head.find('[name=description], [name=Description]').attr('content') || '',
            image: $('img:first').prop('src') || '',
            imageSelector: undefined,
            weiboKey: '',
            mobileSites: [],
            sites: ['weibo','qq','wechat','tencent','douban','qzone','linkedin','diandian','facebook','twitter','google','copy'],
            disabled: [],
            initialized: false
        };

        var $globals = $.extend({}, $defaults, $options);

        var $templates = {
            qzone       : 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url={{URL}}&title={{TITLE}}&desc={{DESCRIPTION}}&summary={{SUMMARY}}&site={{SOURCE}}&pics={{IMAGE}}',
            qq          : 'http://connect.qq.com/widget/shareqq/index.html?url={{URL}}&title={{TITLE}}&source={{SOURCE}}&desc={{DESCRIPTION}}&pics={{IMAGE}}',
            tencent     : 'http://share.v.t.qq.com/index.php?c=share&a=index&title={{TITLE}}&url={{URL}}&pic={{IMAGE}}',
            weibo       : 'https://service.weibo.com/share/share.php?url={{URL}}&title={{TITLE}}&pic={{IMAGE}}&appkey={{WEIBOKEY}}',
            wechat      : 'javascript:;',
            douban      : 'http://shuo.douban.com/!service/share?href={{URL}}&name={{TITLE}}&text={{DESCRIPTION}}&image={{IMAGE}}&starid=0&aid=0&style=11',
            diandian    : 'http://www.diandian.com/share?lo={{URL}}&ti={{TITLE}}&type=link',
            linkedin    : 'http://www.linkedin.com/shareArticle?mini=true&ro=true&title={{TITLE}}&url={{URL}}&summary={{SUMMARY}}&source={{SOURCE}}&armin=armin',
            facebook    : 'https://www.facebook.com/sharer/sharer.php?u={{URL}}&title={{TITLE}}&description={{DESCRIPTION}}&caption={{SUBHEAD}}&link={{URL}}&picture={{IMAGE}}',
            twitter     : 'https://twitter.com/intent/tweet?text={{TITLE}}&url={{URL}}&via={{SITE_URL}}',
            google      : 'https://plus.google.com/share?url={{URL}}',
			copy        : 'javascript:;'
        };

        var $ariaLabels = {
            qzone: "QQ空间",
            qq: "QQ",
            tencent: "腾讯微博",
            weibo: "微博",
            wechat: "微信",
            douban: "豆瓣",
            diandian: "点点",
            linkedin: "LinkedIn",
            facebook: "Facebook",
            twitter: "Twitter",
            google: "Google",
			copy: "复制链接"
        };

        this.each(function() {
            if ($(this).data('initialized')) {
                return true;
            }

            var $data      = $.extend({}, $globals, $(this).data());
            if ($data.imageSelector) {
                $data.image = $($data.imageSelector).map(function() {
                    return $(this).prop('src');
                }).get().join('||');
            }
            var $container = $(this).addClass('share-component tzt-share');

            createIcons($container, $data);
            createWechat($container, $data);
			createCopy($container, $data);
            $(this).data('initialized', true);
        });

        /**
         * Create site icons
         *
         * @param {Object|String} $container
         * @param {Object}        $data
         */
        function createIcons ($container, $data) {
            var $sites = getSites($data);

            $data.mode == 'prepend' ? $sites.reverse() : $sites

            if (!$sites.length) {return;}

            $.each($sites, function (i, $name) {
                var $url  = makeUrl($name, $data);
                var $link = $data.initialized ? $container.find('.icon-'+$name) : $('<a class="share-icon icon-'+$name+'"></a>');

                if (!$link.length) {
                    return true;
                }
                $link.prop('aria-label', "分享到 "+$ariaLabels[$name]);

                //$link.prop('href', $url);
                $link.prop('href', 'javascript:;');

                if (!$data.initialized) {
                    $data.mode == 'prepend' ? $container.prepend($link) : $container.append($link);
                }
                
                if ($name === 'wechat'||$name === 'copy') {
                    $link.prop('tabindex', -1);
                } else {
                    $link.on("click", function() {
                        window.open(encodeURI(""+$url),'_blank','width=600,height=600,top=150px,left=200px');
                    });
                }
                
            });

            
        }

        /**
         * Create the wechat icon and QRCode.
         *
         * @param {Object|String} $container
         * @param {Object}        $data
         */
        function createWechat ($container, $data) {
            var $wechat = $container.find('a.icon-wechat');
			$wechat.on("click", function() {
				$("#DialogShare").addClass('show');
				$(".mask").show();
			});
        }

		 /**
         * Create the copy icon.
         *
         * @param {Object|String} $container
         * @param {Object}        $data
         */
		function createCopy ($container, $data) {
		    var $heart = $container.find('a.icon-copy');
			$heart.on("click", function() {
				$("body").append("<input id='copyurl' type='text' value='"+$data.url+"' style='opacity:0;'>");
				var copyobject=document.getElementById("copyurl");
				copyobject.select();
				document.execCommand("Copy");
				tzt_toast('链接复制成功','1',1000);
				$("#copyurl").remove();
			});
		}

        /**
         * Get available site lists.
         *
         * @param {Array} $data
         *
         * @return {Array}
         */
        function getSites ($data) {
            if ($data['mobileSites'].length === 0 && $data['sites'].length) {
                $data['mobileSites'] = $data['sites'];
            };

            var $sites = (isMobileScreen() ? $data['mobileSites'] : ($data['sites'].length ? $data['sites']: [])).slice(0);
            var $disabled = $data['disabled'];

            if (typeof $sites == 'string') { $sites = $sites.split(/\s*,\s*/); }
            if (typeof $disabled == 'string') { $disabled = $disabled.split(/\s*,\s*/); }

            if (runningInWeChat()) {
                $disabled.push('wechat');
            }
            // Remove elements
            $disabled.length && $.each($disabled, function (i, el) {
                var removeItemIndex = $.inArray(el, $sites);
                if (removeItemIndex !== -1) {
                    $sites.splice(removeItemIndex, 1);
                }
            });

            return $sites;
        }

        /**
         * Build the url of icon.
         *
         * @param {String} $name
         * @param {Object} $data
         *
         * @return {String}
         */
        function makeUrl ($name, $data) {
            var $template = $templates[$name];
            $data['summary'] = $data['description'];

            for (var $key in $data) {
                if ($data.hasOwnProperty($key)) {
                    var $camelCaseKey = $name + $key.replace(/^[a-z]/, function($str){
                        return $str.toUpperCase();
                    });

                    var $value = encodeURIComponent($data[$camelCaseKey] === undefined ? $data[$key] : $data[$camelCaseKey]);
                    $template = $template.replace(new RegExp('{{'+$key.toUpperCase()+'}}', 'g'), $value);
                }
            }

            return $template;
        }

        /**
         * Detect wechat browser.
         *
         * @return {Boolean}
         */
        function runningInWeChat() {
            return /MicroMessenger/i.test(navigator.userAgent);
        }

        /**
         * Mobile screen width.
         *
         * @return {boolean}
         */
        function isMobileScreen () {
            return $(window).width() <= 768;
        }
    };

    // Domready after initialization
    $(function () {
		$('.qrcode').qrcode({render: 'image', size: 240, text: location.href});
        $('.share-component,.tzt-share').share();
    });
})(jQuery);
