        <!-- footer -->
        {{-- <div class="footer-artwork mb-2" id="footer-artwork">&nbsp;</div> --}}

        <div class="footer-wrapper full-width" id="footer-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-12 pt-3 mobileFooter"> 
                        <div class="footer-credit" id="footer">
                            <p style="font-size: 12px; text-align:left;" class="mobileFooter footerText"> সাইটটি শেষ হাল-নাগাদ করা হয়েছে: <span style="font-style: italic;">২০২২-০৮-০১ ১২:০০:০০</span> </p>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12 pt-3 mobileFooter"> 
                        <div class="footer-credit mobileFooter" id="footer">
                            <p style="font-size: 12px; text-align:right;" class="mobileFooter footerText"> পরিকল্পনা ও বাস্তবায়নে:&nbsp; <a href="http://www.dae.gov.bd/">কৃষি সম্প্রসারণ অধিদপ্তর</a>। </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-width" style="background: #b56b32; color: white;">
            <div class="container">
                <div class="row" style="height: 45px;">
                    <div class="col-md-6 py-3" style="height: 45px;">
                        <p style="font-size: 12px; text-align:left;" class="mobileFooter footerText"> কপিরাইট: ২০২২ &copy; <a href="http://www.dae.gov.bd/" style="color: white;">কৃষি সম্প্রসারণ অধিদপ্তর</a>। </p>
                    </div>
                    <div class="col-md-6 py-3" style="height: 45px;">
                        <p style="font-size: 12px; text-align:right;" class="mobileFooter footerText"> কারিগরি সহায়তায়:&nbsp; 
                            <a href="https://sebpo.com/" target="_blank" style="color: white;"> 
                                সার্ভিস ইঞ্জিন লিমিটেড
                            </a> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!--custom scripts-->
        <script>
            $(document).ready(function() {
                $("#navigation").click(function() {
                    $("#portal_navigation .portals").toggle();
                });
            });

            /* Responsive Design */
            $(document).ready(function() {
                var wi = $(window).width();
                if(wi < 980) {
                    $('#jmenu .show-menu').click(function() {
                        //$('.mzr-responsive').show();
                        $(".mzr-responsive").slideToggle(400, "linear", function() {});
                    });
                    $("#jmenu a.submenu").click(function() {
                        $('#jmenu a.submenu').siblings().addClass('sibling-toggle');
                        $(this).parent().find(".mzr-content").removeClass('sibling-toggle').addClass('slide-visible').slideToggle(400, "linear", function() {
                            return false;
                        });
                        // return false;
                    });
                }
            });
        </script>

        <script>

            function openInNewTab(url) {
                var win = window.open(url, '_blank');
                win.focus();
            }

            function isExternal(url) {
                var match = url.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/);
                if(typeof match[1] === "string" && match[1].length > 0 && match[1].toLowerCase() !== location.protocol) return true;
                if(typeof match[2] === "string" && match[2].length > 0 && match[2].replace(new RegExp(":(" + {
                        "http:": 80,
                        "https:": 443
                    }[location.protocol] + ")?$"), "") !== location.host) return true;
                return false;
            }
        </script>

        <script>
            $(function() {
                function initNoticeBoardTicker(id, options) {
                    var $scroller = $(id);
                    $scroller.vTicker('init', options);
                    $("#notice-board-ticker .next").click(function(event) {
                        event.preventDefault();
                        var checked = true;
                        $('#notice-board-ticker').vTicker('next', {
                            animate: false
                        });
                    });
                    $("#notice-board-ticker .prev,#notice-board-ticker .next").hover(function() {
                        $scroller.vTicker('pause', true);
                    }, function() {
                        $scroller.vTicker('pause', false);
                    });
                    $("#notice-board-ticker .prev").click(function(event) {
                        event.preventDefault();
                        var checked = true;
                        $('#notice-board-ticker').vTicker('prev', {
                            animate: checked
                        });
                    });
                }
            });
        </script>

        <script>
            // $(".meganizr .mzr-drop").keyup(function() {
            //     $(".mzr-content").attr("aria-hidden", "true");
            //     $(this).find(".mzr-content").attr("aria-hidden", "false");
            // });

            $('img').each(function() {
                var str = $(this).attr("src");
                var arr = str.split('');
                var strFine = arr[arr.length - 1];
                var str2 = strFine;
                var arr2 = str2.split('.');
                var strFine2 = arr2[arr2.length - 2];
                $(this).attr('alt', strFine2);
            });

            $('.block img').each(function() {
                var strTitleRight = $(this).closest('.block').find('.title').text();
                $(this).attr('alt', strTitleRight);
            });

            // $(".mzr-content").mouseout(function() {
            //     $(this).hide();
            // });
            // $(".mzr-content").mouseover(function() {
            //     $(this).show();
            // });
        </script>
    </body>

</html>