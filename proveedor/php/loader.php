<style>
        .overlay{
            background: rgba(0,0,0,.3);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            align-items: center;
            justify-content: center;
            display: none;
            /* visibility: hidden; */
        }
        .content_loader{
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
        }
        .loader {
            border: 6px solid #f3f3f3; /* Light grey */
            border-top: 6px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
        }
</style>
<script type="text/javascript">
        function loader(){
            var loader = document.getElementById("overlay");
            loader.style.display= "block";
        }
</script>


<div class="overlay" id="overlay">
        <div class="content_loader">
            <div class="loader" id="loader"></div>
        </div>
</div>