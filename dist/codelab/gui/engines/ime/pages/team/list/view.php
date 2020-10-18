<?php
    engine::asset(
        array(
            // Plugins
            // -- DataTables
            '/assets/plugins/datatables/datatables.min.css',
            '/assets/plugins/datatables/datatables.min.js',
            // Widgets
            '/assets/styles/widgets/pageTable.css',
            '/assets/styles/widgets/pageTable_filters.css',
            '/assets/styles/widgets/pageTable_mass.css',
        )
    );

?>
<!-- char-visitors-log-dashboard -->

<div class="g">

    <div class="g15">

        <div  class="widget pageTable_filters">
            <h1>Filters</h1>
            <div class="inner">
                <div class="filter">
                    <div class="name">
                        Search
                    </div>
                    <div class="input inputIcon">
                        <input id="filterSearch" type="text" class="inp" placeholder="Id, username or email" /><i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="filter">
                    <div class="name">
                        Account status
                    </div>
                    <div class="input">
                        <select id="filterStatus" class="inp">
                          <option value="all">All</option>
                          <option value="active">Active</option>
                          <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="button">
                    <button class="btn full" id="filterButton">Search</button>
                </div>
            </div>
        </div>
        <div  class="widget pageTable_mass disabled">
            <h1>Selected (<span id="clTPageableSelectedCount">0</span>)</h1>
            <ul>
                <li><a src="<?php echo clUrl; ?>/cl/team/mass-edit/" href="">Mass edit (TODO)</a></li>
                <li><a src="<?php echo clUrl; ?>/cl/team/delete/" href="">Delete</a></li>
            </ul>
        </div>






    </div>








    <div class="g45">

        <div class="widget pageTable">
            <div class="table">
                <table id="teamTable" class="display" style="width:100%">
                    <thead class="clTableColumns">
                        <tr>
                            <th class="min">Id</th>
                            <th class="min">Avatar</th>
                            <th class="min">Active</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>



</div>
