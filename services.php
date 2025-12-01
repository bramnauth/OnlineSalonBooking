<?php include 'includes/header.php'; ?>

<style>
    .info-title {
        text-align: center;
        margin-top: 20px;
        color: #3e3e3e;
    }

    .info-intro {
        text-align: center;
        margin: 10px auto 20px auto;
        max-width: 600px;
        color: #555;
    }

    .info-table-wrapper {
        max-width: 800px;
        margin: 0 auto 30px auto;
        padding: 0 10px;
    }

    table.info-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .info-table th,
    .info-table td {
        border: 1px solid #ddd;
        padding: 10px 12px;
        text-align: left;
        vertical-align: top;
    }

    .info-table th {
        background-color: #f8bbd0; /* light purple header */
        color: #3e3e3e;
        text-align: left;
        font-size: 16px;
    }

    .info-label {
        width: 60%;
        font-weight: bold;
        background-color: #f3e5f5;
    }

    .info-table tr:nth-child(even) td:not(.info-label) {
        background-color: #fdf1f7; /* very light pink/purple */
    }

    .services-section-title {
        max-width: 800px;
        margin: 10px auto 5px auto;
        padding: 0 10px;
        color: #4a148c;
        font-size: 18px;
    }
</style>

<h2 class="info-title">Services</h2>

<p class="info-intro">
    Browse our salon &amp; spa services below. Each section lists the service type along with its price.
</p>

<!-- 1. Manicures -->
<h3 class="services-section-title">Manicures</h3>
<div class="info-table-wrapper">
    <table class="info-table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="info-label">Acrylic Full Set</td>
                <td>$55</td>
            </tr>
            <tr>
                <td class="info-label">Acrylic Refill</td>
                <td>$40</td>
            </tr>
            <tr>
                <td class="info-label">Gel Manicure</td>
                <td>$45</td>
            </tr>
            <tr>
                <td class="info-label">Regular Polish Manicure</td>
                <td>$30</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- 2. Pedicures -->
<h3 class="services-section-title">Pedicures</h3>
<div class="info-table-wrapper">
    <table class="info-table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="info-label">Gel Pedicure</td>
                <td>$55</td>
            </tr>
            <tr>
                <td class="info-label">Regular Pedicure</td>
                <td>$40</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- 3. Massages -->
<h3 class="services-section-title">Massages</h3>
<div class="info-table-wrapper">
    <table class="info-table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="info-label">Full Body Massage</td>
                <td>$90</td>
            </tr>
            <tr>
                <td class="info-label">Shoulder &amp; Back Massage</td>
                <td>$65</td>
            </tr>
            <tr>
                <td class="info-label">Hot Stone Massage</td>
                <td>$110</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- 4. Waxes -->
<h3 class="services-section-title">Waxes</h3>
<div class="info-table-wrapper">
    <table class="info-table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="info-label">Eyebrows Wax</td>
                <td>$15</td>
            </tr>
            <tr>
                <td class="info-label">Upper Lip Wax</td>
                <td>$10</td>
            </tr>
            <tr>
                <td class="info-label">Full Face Wax</td>
                <td>$35</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- 5. Threading -->
<h3 class="services-section-title">Threading</h3>
<div class="info-table-wrapper">
    <table class="info-table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="info-label">Eyebrows Threading</td>
                <td>$18</td>
            </tr>
            <tr>
                <td class="info-label">Upper Lip Threading</td>
                <td>$12</td>
            </tr>
            <tr>
                <td class="info-label">Full Face Threading</td>
                <td>$40</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- 6. Hairstyling -->
<h3 class="services-section-title">Hairstyling</h3>
<div class="info-table-wrapper">
    <table class="info-table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="info-label">Trim</td>
                <td>$25</td>
            </tr>
            <tr>
                <td class="info-label">Full Hair Cut</td>
                <td>$50</td>
            </tr>
            <tr>
                <td class="info-label">Highlights</td>
                <td>$120</td>
            </tr>
            <tr>
                <td class="info-label">Balayage</td>
                <td>$150</td>
            </tr>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>

