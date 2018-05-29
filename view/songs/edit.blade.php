@extends('main')

@section('content')
<div class="container">
    <h2>You are in the View: application/view/song/edit.php (everything in this box comes from that file)</h2>
    <!-- add song form -->
    <div>
        <h3>Edit a song</h3>
        <form action="{{URL}}songs/updatesong" method="POST">
            <label>Artist</label>
            <input autofocus type="text" name="artist" value="{{ htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8') }} " required />
            <label>Track</label>
            <input type="text" name="track" value="{{ htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8') }}" required />
            <label>Link</label>
            <input type="text" name="link" value="{{ htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8') }}" />
            <input type="hidden" name="song_id" value="{{ htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8') }}" />
            <input type="submit" name="submit_update_song" value="Update" />
        </form>
    </div>
</div>
@stop
