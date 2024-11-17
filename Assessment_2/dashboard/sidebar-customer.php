<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="sidebarMenuLabel">Future Fit</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
        aria-label="Close"></button>
</div>
<div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
    <h3 class="d-flex align-items-center ps-2"> Hello, <?php echo $_SESSION['loggedInUser_FullName'] ?> </h3>
    <hr class="my-3">

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php if (isset($_GET['dashboard'])) {
                                                                    echo "active";
                                                                } ?>" aria-current="page" href="index.php?dashboard">
                <svg class="bi">
                    <use xlink:href="#house-fill" />
                </svg>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php if (isset($_GET['orders'])) {
                                                                    echo "active";
                                                                } ?>" href="index.php?orders">
                <svg class="bi">
                    <use xlink:href="#file-earmark" />
                </svg>
                Orders
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php if (isset($_GET['products'])) {
                                                                    echo "active";
                                                                } ?>" href="index.php?products">
                <svg class="bi">
                    <use xlink:href="#cart" />
                </svg>
                Products
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php if (isset($_GET['customers'])) {
                                                                    echo "active";
                                                                } ?>" href="index.php?customers">
                <svg class="bi">
                    <use xlink:href="#people" />
                </svg>
                Customers
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php if (isset($_GET['employees'])) {
                                                                    echo "active";
                                                                } ?>" href="index.php?employees">
                <svg class="bi">
                    <use xlink:href="#puzzle" />
                </svg>
                Employees
            </a>
        </li> -->

        <!-- ### -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php if (isset($_GET['appointments'])) {
                                                                    echo "active";
                                                                } ?>" href="index.php?appointments">
                <svg class="bi">
                    <use xlink:href="#puzzle" />
                </svg>
                Appointments
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php if (isset($_GET['suppliers'])) {
                                                                    echo "active";
                                                                } ?>" href="index.php?suppliers">
                <svg class="bi">
                    <use xlink:href="#puzzle" />
                </svg>
                Suppliers
            </a>
        </li> -->
        <!-- ### -->

    </ul>

    <hr class="my-3">

    <ul class="nav flex-column mb-auto">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="../productsInfo/productsInfo.php">
                <svg class="bi">
                    <use xlink:href="#cart" />
                </svg>
                Product Catalog
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php if (isset($_GET['settings'])) {
                                                                    echo "active";
                                                                } ?>" href="index.php?settings">
                <svg class="bi">
                    <use xlink:href="#gear-wide-connected" />
                </svg>
                Settings
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="index.php?sign.out" data-bs-toggle="modal" data-bs-target="#signOutModal">
                <svg class="bi">
                    <use xlink:href="#door-closed" />
                </svg>
                Sign out
            </a>
        </li>
    </ul>
</div>