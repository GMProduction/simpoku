<section>
    
       
    <select name="" id="combo" class="form-control" onchange="comboCariEven()">
            <option value="">- Pilih Specialis -</option>
        @foreach ($sp as $item)
        <option value="{{$item->gelar}}">{{$item->spec}}</option>
        @endforeach
    </select>
    
</section>