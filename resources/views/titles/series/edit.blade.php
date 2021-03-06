@include('layouts.header')
<article class="form-container">
  <section>
    <form method="POST" action="/titles/series/{{$title->id}}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <h3>Title</h3>
      <input class="input" name="title"value="{{ $series->title }}">
      <button class="button is-info" type="submit">Submit</button>   
    </form>
  </section>
  <section>
    <form method="POST" action="/titles/series/{{$title->id}}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <h3>Plot Summary</h3>
      <textarea class="textarea" name="plot_summary">{{ $series->plot_summary }}"</textarea>
      <button class="button is-info" type="submit">Submit</button>   
    </form>
  </section>
  <section>
    <form method="POST" action="/titles/series/{{$title->id}}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <h3>Release Date (Please use the folowing format: YYYY-MM-DD)</h3>
      <input class="input" name="release_year" value="{{ $series->release_year }}" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
      <button class="button is-info" type="submit">Submit</button>   
    </form>
  </section>
  <section>
    <form method="POST" action="/titles/series/{{$title->id}}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <h3>End Date (Please use the folowing format: YYYY-MM-DD)</h3>
      <input class="input" name="end_date" value="{{ $series->end_date }}" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
      <button class="button is-info" type="submit">Submit</button>   
    </form>
  </section>
  <section>
    <form method="POST" action="/titles/series/{{$title->id}}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <h3>Countries</h3>
      <input class="input" name="countries"value="{{ $series->countries }}">
      <button class="button is-info" type="submit">Submit</button>   
    </form>
  </section>
  <section>
    <form method="POST" action="/titles/series/{{$title->id}}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <h3>PG Rating</h3>
      <input class="input" name="pg_rating" value="{{ $series->pg_rating }}">
      <button class="button is-info" type="submit">Submit</button>   
    </form>
  </section>
  <section>
    <form method="PUT" action="/titles/series/{{$title->id}}">
      <h3>Trailer URL</h3>
      <input class="input" name="trailer"value="{{ $series->trailer }}">
      <button class="button is-info" type="submit">Submit</button>   
    </form>
  </section>
  <section>
    <form method="POST" action="/titles/series/{{$title->id}}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <h3>Genres:</h3>
      <textarea class="textarea" name="genres">{{$genres}}</textarea>
      <button class="button is-info" type="submit">Submit</button>   
    </form>
  </section>
  <section>
    <form method="POST" action="/titles/series/{{$title->id}}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <h3>Creators:</h3>
      <textarea class="textarea" name="creators">{{$creators}}</textarea>
      <button class="button is-info" type="submit">Submit</button>   
    </form>
  </section>
  <section>
      <h3>Photos:</h3>
      <form method="POST" action="/titles/series/{{$title->id}}" class="photo-form" >
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input class="input" type="text" name="photo_path" required>
        <div class="select">
          <select type="text" name="photo_type" required>
            <option value="poster" selected>poster<option/>
            <option value="backdrop">backdrop<option/>
            <option value="profile">profile</option>
          </select>
        </div>
        <input class="input" type="number" name="width" required >
        <input class="input" type="number" name="ratio" step="0.01" min="0.01" required >
        <button class="button is-info" type="submit">Add new photo!</button>   
      </form>
      @foreach($photos as $photo)
      <div class="photo-form">
        <form method="POST" action="/titles/series/{{$title->id}}" class="photo-form" >
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input class="input" type="text" name="photo_path" value="{{$photo->photo_path}}" required>
          <div class="select">
            <select  type="text" name="photo_type" required>
              @if($photo["photo_type"] === "poster" )
                <option value="poster" selected>poster<option/>
                <option value="backdrop">backdrop<option/>
                <option value="profile">profile</option>
              @elseif($photo["photo_type"] === "backdrop")
                <option value="poster">poster<option/>
                <option value="backdrop" selected>backdrop<option/>
                <option value="profile">profile</option>
              @else
                <option value="poster" >poster<option/>
                <option value="backdrop">backdrop<option/>
                <option value="profile" selected>profile</option>
              @endif
            </select>
          </div>
          <input class="input" type="number" name="width" value="{{$photo->width}}" required>
          <input  class="input" type="number" name="ratio" step="0.01" min="0.01" value="{{$photo->ratio}}" required>
          <input  class="input" type="hidden" name="photo_id" value="{{$photo->id}}">
          <button class="button is-info" type="submit">Update</button>   
        </form>
        <form method="POST" action="/titles/series/{{$title->id}}" class="photo-delete-form">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="photo_id" value="{{$photo->id}}">
            <input type="hidden" name="delete" value=true>
            <button class="button is-danger" type="submit">delete</button>   
        </form>
      </div>
    @endforeach
  </section>
  </article>
@include('layouts.footer')