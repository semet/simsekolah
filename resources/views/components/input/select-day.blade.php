<select name="hari" id="hari" class="form-select">
    <option value="" selected>--Hari--</option>
    <option @selected(request()->get('hari') == 'senin') value="senin">senin</option>
    <option @selected(request()->get('hari') == 'selasa') value="selasa">selasa</option>
    <option @selected(request()->get('hari') == 'rabu') value="rabu">rabu</option>
    <option @selected(request()->get('hari') == 'kamis') value="kamis">kamis</option>
    <option @selected(request()->get('hari') == 'jumat') value="jumat">jumat</option>
    <option @selected(request()->get('hari') == 'sabtu') value="sabtu">sabtu</option>
</select>
