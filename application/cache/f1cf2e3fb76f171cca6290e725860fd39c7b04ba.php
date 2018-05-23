<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>You are in the View: application/view/song/index.php (everything in this box comes from that file)</h2>
    <!-- add song form -->


    <?php if(($status=='admin')||($status=='user')): ?>
    <div class="box">
        <h3>Add a song</h3>
        <form action="<?php echo e(URL); ?>songs/addsong" method="POST">
            <label>Artist</label>
            <input type="text" name="artist" value="" required />
            <label>Track</label>
            <input type="text" name="track" value="" required />
            <label>Link</label>
            <input type="text" name="link" value="" />
            <input type="submit" name="submit_add_song" value="Submit" />
        </form>
    </div>
    <?php endif; ?>
    <!-- main content output -->
    <div class="box">
        <h3>Amount of songs (data from second model)</h3>
        <div>
            <?php echo e($amount_of_songs); ?>

        </div>
        <h3>Amount of songs (via AJAX)</h3>
        <div>
            <button id="javascript-ajax-button">Click here to get the amount of songs via Ajax (will be displayed in #javascript-ajax-result-box)</button>
            <div id="javascript-ajax-result-box"></div>
        </div>
        <h3>List of songs (data from first model)</h3>
        <table>
            <thead>
            <tr>
                <td>Id</td>
                <td>Artist</td>
                <td>Track</td>
                <td>Link</td>

                <?php if($status=='admin'): ?>
                <td>DELETE</td>
                <td>EDIT</td>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody id="rows">

            </tbody>
        </table>
    </div>
</div>
<div id="all"></div>
    <script type="text/javascript">

        function deleteSong(id){
            alert('in');
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function(){
                if(xhr.readyState==4){
                    console.log('hello');
                }
            }

            xhr.open("get", "<?php echo e(URL); ?>songs/deletesong/"+id, true);
            xhr.send();

        }

        function get() {
            //alert('in');
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    var res = JSON.parse(xhr.responseText);
                    console.log(res);
                    var tbody = document.getElementsByTagName('tbody')[0];


                    for (var i = 0; i < res.length; i++) {

                        var tr = document.createElement('tr');

                        var td1 = document.createElement("td");
                        td1.innerHTML = res[i].id;
                        var td2 = document.createElement("td");
                        td2.innerHTML = res[i].artist;
                        var td3 = document.createElement("td");
                        td3.innerHTML = res[i].track;
                        var td4 = document.createElement("td");
                        td4.innerHTML = res[i].link;
                        var td5 = document.createElement("td");
                        td5.innerHTML = '<a href="<?php echo e(URL); ?>api/deletesong">delete</a>';
                        var td6 = document.createElement("td");
                        td6.innerHTML = '<a href="<?php echo e(URL); ?>api/editsong">edit</a>';

                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td4);
                        <?php if($status=='admin'): ?>
                        tr.appendChild(td5);
                        tr.appendChild(td6);
                        <?php endif; ?>
                        tbody.appendChild(tr);

                    }
                }
            }
            xhr.open("get", "<?php echo e(URL); ?>api/getsongs", true);
            xhr.send();

        }
        function hello(){
            alert('hello');
        }
    //hello();
    //get();
        window.onload = function () {
            get();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>