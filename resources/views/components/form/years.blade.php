<select name="ano" id="ano" class="form-control">
    <option value="{{now()->year}}" selected>{{now()->year}}</option>
    @for($i=1; $i<=10; $i++)
        <option value="{{now()->year + $i}}">{{now()->year + $i}}</option>
    @endfor
</select>