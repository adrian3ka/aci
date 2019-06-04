<div style="width: 100%;">
	<div class="row" style="margin-left: 0px; margin-right: 0px;">
        <div id="filter-panel" class="collapse filter-panel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="page_size">Rows per page:</label>
                            <select name="page_size" class="form-control">
                                <option {{ (($page_size == 1) ? "selected" : "") }} value="1">1</option>
                                <option {{ (($page_size == 5) ? "selected" : "") }} value="5">5</option>
                                <option {{ (($page_size == 10) ? "selected" : "") }} value="10">10</option>
                                <option {{ (($page_size == 15) ? "selected" : "") }} value="15">15</option>
                                <option {{ (($page_size == 20) ? "selected" : "") }} value="20">20</option>
                                <option {{ (($page_size == 30) ? "selected" : "") }} value="30">30</option>
                                <option {{ (($page_size == 40) ? "selected" : "") }} value="40">40</option>
                                <option {{ (($page_size == 50) ? "selected" : "") }} value="50">50</option>
                            </select>                                
                        </div> <!-- form group [rows] -->
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="month">Bulan Lahir</label>
                            <select name="month" class="form-control">
                                <option {{ (($month == 0) ? "selected" : "") }} value="0"></option>
                                <option {{ (($month == 1) ? "selected" : "") }} value="1">Januari</option>
                                <option {{ (($month == 2) ? "selected" : "") }} value="2">Februari</option>
                                <option {{ (($month == 3) ? "selected" : "") }} value="3">Maret</option>
                                <option {{ (($month == 4) ? "selected" : "") }} value="4">April</option>
                                <option {{ (($month == 5) ? "selected" : "") }} value="5">Mei</option>
                                <option {{ (($month == 6) ? "selected" : "") }} value="6">Juni</option>
                                <option {{ (($month == 7) ? "selected" : "") }} value="7">Juli</option>
                                <option {{ (($month == 8) ? "selected" : "") }} value="8">Agustus</option>
                                <option {{ (($month == 9) ? "selected" : "") }} value="9">September</option>
                                <option {{ (($month == 10) ? "selected" : "") }} value="10">Oktober</option>
                                <option {{ (($month == 11) ? "selected" : "") }} value="11">November</option>
                                <option {{ (($month == 12) ? "selected" : "") }} value="12">Desember</option>
                            </select>                                
                        </div> <!-- form group [month] -->
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="key">Search:</label>
                            <input type="text" class="form-control input-sm" name="key" value="{{ $key }}">
                        </div><!-- form group [search] -->
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            </div>
        </div>    
        <button type="button" style="width: 100%;" class="btn btn-primary" data-toggle="collapse" data-target="#filter-panel">
            <span class="glyphicon glyphicon-cog"></span> Advanced Search
        </button>
	</div>
</div>
