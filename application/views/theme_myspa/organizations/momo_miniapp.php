<html>

<head>
    <meta property="og:title" content="Myspa" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="https://beautyx.vn/blog/wp-content/uploads/2022/07/Logo-Beauty-X-1024x1024-1.png" />
    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="343696409624609" />
    <meta property="al:ios:url" content='momo://?action=marketing&featureCode=miniapp.TrkMv54nrF1g1UmRGp1i.myspaapp&refId=miniapp.TrkMv54nrF1g1UmRGp1i.myspaapp&deeplink=true&myspaDeeplink=https://beautyx.vn/cua-hang/<?= $org ?>' />
    <script>
        window.onload = function() {
            var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            if (isMobile) {
                var now = new Date().valueOf();
                window.location = 'momo://?action=marketing&featureCode=miniapp.TrkMv54nrF1g1UmRGp1i.myspaapp&refId=miniapp.TrkMv54nrF1g1UmRGp1i.myspaapp&deeplink=true&myspaDeeplink=https://beautyx.vn/cua-hang/<?= $org ?>';
                setTimeout(function() {
                    if (new Date().valueOf() - now > 5000) {
                        return;
                    }
                    window.location = 'https://myspa.vn';
                }, 4000);
            } else {
                window.location = 'https://myspa.vn';
            }
        }
    </script>
</head>

</html>