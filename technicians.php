<?php include 'includes/header.php'; ?>

<style>
    .tech-title {
        text-align: center;
        margin-top: 20px;
        color: #3e3e3e;
    }

    .tech-intro {
        text-align: center;
        margin: 10px auto 20px auto;
        max-width: 600px;
        color: #555;
    }

    .tech-table-wrapper {
        max-width: 800px;
        margin: 0 auto 40px auto;
        padding: 0 10px;
    }

    table.tech-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .tech-table th,
    .tech-table td {
        border: 1px solid #ddd;
        padding: 10px 12px;
        text-align: left;
    }

    .tech-table th {
        background-color: #f8bbd0; /* soft pink header */
        color: #3e3e3e;
    }

    .tech-table tr:nth-child(even) {
        background-color: #fdf1f7; /* very light pink */
    }

    .tech-table tr:hover {
        background-color: #ffe4f0; /* hover highlight */
    }

    .rating-cell {
        text-align: center;
        width: 10%;
    }
</style>

<h2 class="tech-title">Technicians</h2>

<p class="tech-intro">
    Here you can find our salon &amp; spa technicians, their specializations, and how to contact them.<br>
    All technicians are certified in each service listed.<br>
    The table below is just based on their preference of service.
</p>

<div class="tech-table-wrapper">
    <table class="tech-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialization</th>
                <th>Email</th>
                <th>Phone</th>
                <th class="rating-cell">Rating</th>
            </tr>
        </thead>
        <tbody>
    <tr>
        <td><strong>Chloe Patel</strong></td>
        <td>Manicures</td>
        <td>chloe.patel@glowsalon.com</td>
        <td>(201) 555-0101</td>
        <td class="rating-cell">4.82 / 5</td>
    </tr>
    <tr>
        <td><strong>Isabella Nguyen</strong></td>
        <td>Pedicures</td>
        <td>isabella.nguyen@glowsalon.com</td>
        <td>(201) 555-0102</td>
        <td class="rating-cell">4.79 / 5</td>
    </tr>
    <tr>
        <td><strong>Mia Rodriguez</strong></td>
        <td>Massages</td>
        <td>mia.rodriguez@glowsalon.com</td>
        <td>(201) 555-0103</td>
        <td class="rating-cell">4.93 / 5</td>
    </tr>
    <tr>
        <td><strong>Ava Thompson</strong></td>
        <td>Waxes</td>
        <td>ava.thompson@glowsalon.com</td>
        <td>(201) 555-0104</td>
        <td class="rating-cell">4.87 / 5</td>
    </tr>
    <tr>
        <td><strong>Sofia Martinez</strong></td>
        <td>Threading</td>
        <td>sofia.martinez@glowsalon.com</td>
        <td>(201) 555-0105</td>
        <td class="rating-cell">4.90 / 5</td>
    </tr>
    <tr>
        <td><strong>Liam Johnson</strong></td>
        <td>Hairstyling</td>
        <td>liam.johnson@glowsalon.com</td>
        <td>(201) 555-0106</td>
        <td class="rating-cell">4.88 / 5</td>
    </tr>
</tbody>

    </table>
</div>

<?php include 'includes/footer.php'; ?>
