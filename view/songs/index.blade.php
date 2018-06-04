@extends('main')


@section('content')
    <div class="container">
        <div><h2><span id="msg" style="color:green"></span></h2></div>
        <div><h2><span id="error" style="color:red"></span></h2></div>
        <h2>You are in the View: application/view/song/index.php (everything in this box comes from that file)</h2>
        <!-- add song form -->


        @if(($status=='admin')||($status=='user'))
            <div class="box">
                <h3>Add a song</h3>
                <form action="{{URL}}songs/addsong" method="POST">
                    <label>Artist</label>
                    <input type="text" name="artist" value="" />
                    <label>Track</label>
                    <input type="text" name="track" value="" />
                    <label>Link</label>
                    <input type="text" name="link" value=""/>
                    <input type="button" onclick='saveSong(this.form)' name="submit_add_song" value="Save"/>
                </form>
            </div>
            <div id="edit_form" class="box" style="display:none">
                <h3>Edit song</h3>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="" />
                    <label>Artist</label>
                    <input type="text" name="artist" value="" />
                    <label>Track</label>
                    <input type="text" name="track" value="" />
                    <label>Link</label>
                    <input type="text" name="link" value=""/>
                    <input type="button" onclick='editSong(this.form)' name="submit_add_song" value="Edit"/>
                </form>
            </div>
         @endif
    <!-- main content output -->
        <div class="box">
            <h3>Amount of songs (data from second model)</h3>
            <div>
                {{$amount_of_songs}}
            </div>
            <h3>Amount of songs (via AJAX)</h3>
            <div>
                <button id="javascript-ajax-button">Click here to get the amount of songs via Ajax (will be displayed in
                    #javascript-ajax-result-box)
                </button>
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

                    @if($status=='admin')
                        <td>DELETE</td>
                        <td>EDIT</td>
                    @endif
                </tr>
                </thead>
                <tbody id="rows">

                </tbody>
            </table>
        </div>
    </div>
    <div id="all"></div>
    <script type="text/javascript">

        // Start
        window.onload = function(){
            get();
        }

        var tbody = document.getElementById('rows');
        var edit_form = document.getElementById('edit_form');
        var msg = document.getElementById('msg');
        var err = document.getElementById('error');

        // Delete song
        function deleteSong(id) {
            //alert('in');
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    var message = JSON.parse(this.responseText);
                    msg.innerHTML = message;
                    clearMsg();
                    get();
                }
            }
            xhr.open("get", "/songsapi/deletesong/" + id, true);
            xhr.send();

        }

        // Save new song
        function saveSong(form){
            var song = {};
            song.artist = form.artist.value;
            song.track = form.track.value;
            song.link = form.link.value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    var result = JSON.parse(this.responseText);
                    for(var i=0;i<result.message.length;i++){
                        err.innerHTML += result.message[i];
                    }
                    form.artist.value = "";
                    form.track.value = "";
                    form.link.value = "";
                    var tr = document.createElement('tr');
                    for(var j in result.data){
                        var td = document.createElement('td');
                        td.innerHTML = result.data[j];
                        tr.appendChild(td);
                    }
                    var del = document.createElement("td");
                    var edit = document.createElement("td");
                    del.innerHTML = "<a onclick='deleteSong(" + result.data.id + ")' href='#'>delete</a>";
                    edit.innerHTML = "<a onclick='editForm(" + result.data.id + ")' href='#'>edit</a>";
                    tr.appendChild(del);
                    tr.appendChild(edit);
                    tbody.appendChild(tr);
                    clearMsg();
                }
            }

            xhr.open("post", "/songsapi/savesong/", true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.send(JSON.stringify(song));
        }

        // Fillling the form for editing
        function editForm(id){
            edit_form.style.display = "block";

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    var song = JSON.parse(this.responseText).data;
                    var form = document.forms[1];
                    form.id.value = song.id;
                    form.artist.value = song.artist;
                    form.track.value = song.track;
                    form.link.value = song.link;
                }
            }
            xhr.open("get", "/songsapi/getbyid/" + id, true);
            xhr.send(null);
        }

        // Edit song
        function editSong(form){
            var song = {};
            song.id = form.id.value;
            song.artist = form.artist.value;
            song.track = form.track.value;
            song.link = form.link.value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    var response = JSON.parse(this.responseText);
                    for(var i=0;i<response.message.length;i++){
                        err.innerHTML += response.message[i];
                    }
                    form.artist.value = "";
                    form.track.value = "";
                    form.link.value = "";
                    edit_form.style.display = "none";
                    get();
                    clearMsg();
                }
            }
            xhr.open("post", "/songsapi/editsong/", true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.send(JSON.stringify(song));
        }

        // Get all songs
        function get() {
            tbody.innerHTML = "";

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    var songs = JSON.parse(this.responseText).data;

                    for (var i = 0; i < songs.length; i++) {

                        var tr = document.createElement('tr');

                        for(var j in songs[i]){
                            if((j=='updated_at')||(j=='created_at')) continue;
                            var td = document.createElement("td");
                            td.innerHTML = songs[i][j];
                            tr.appendChild(td);
                        }
                                @if($status=='admin')
                        var del = document.createElement("td");
                        var edit = document.createElement("td");
                        // var obj = res[i];
                        del.innerHTML = "<a onclick='deleteSong(" + songs[i].id + ")' href='#'>delete</a>";
                        edit.innerHTML = "<a onclick='editForm(" + songs[i].id + ")' href='#'>edit</a>";
                        tr.appendChild(del);
                        tr.appendChild(edit);
                        @endif
                        //tr.setAttribute('id', $songs[i].id);
                        tbody.appendChild(tr);
                    }
                }
            }
            xhr.open("get", "/songsapi/getsongs", true);
            xhr.send();
        }

        // Show errors after validation
        function showErrors(message){
            msg.innerHTML = "";
            for(var i in message){
                for(var j=0;j<message[i].length;j++){
                    msg.innerHTML += message[i][j] + "<br>";
                }
            }
        }


        // Clear message
        function clearMsg(){
            setTimeout(function () {
                msg.innerHTML = "";
                err.innerHTML = "";
            }, 3000);
        }

    </script>
@stop