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
