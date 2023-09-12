<div class="sorting-dropdown align-center">
    <div id="dropdown-name">
        <span>Sort By:</span>
    </div>
    <div style="width: 160px" id="dropdown-filter">
        <div>
            <div>
                <form id="form-filter-drop" action="/filter-drop" method="GET">
                    @csrf
                    <select class="border border-solid border-gray-500" name="drop-filter" id="drop-filter">
                        <option selected value>Please select</option>
                        <option value="best-seller">Best seller</option>
                        <option value="pricehtol">Price high to low</option>
                        <option value="priceltoh">Price low to high</option>
                    </select>
                </form>
                <script>
                    document.getElementById('drop-filter').addEventListener('change', function() {
                        document.getElementById('form-filter-drop').submit();
                    });
                </script>
            </div>
        </div>
    </div>
</div>
