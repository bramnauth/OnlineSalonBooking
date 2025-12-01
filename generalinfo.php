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
       margin: 0 auto 40px auto;
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
       text-align: center;
       font-size: 16px;
   }


   .info-label {
       width: 25%;
       font-weight: bold;
       background-color: #f3e5f5;
   }


   .info-table tr:nth-child(even) td:not(.info-label) {
       background-color: #fdf1f7; /* very light pink/purple */
   }
</style>


<h2 class="info-title">General Information</h2>


<p class="info-intro">
   Find key details about GlowSalon, including our location, hours, and how to get in touch.
</p>


<div class="info-table-wrapper">
   <table class="info-table">
       <thead>
           <tr>
               <th colspan="2">GlowSalon - General Information</th>
           </tr>
       </thead>
       <tbody>
           <tr>
               <td class="info-label">Location</td>
               <td>
                   GlowSalon<br>
                   123 Raymond Blvd<br>
                   Newark, NJ 19029
               </td>
           </tr>
           <tr>
               <td class="info-label">Hours of Operation</td>
               <td>
                   <strong>Monday - Friday:</strong> 10:00 AM - 7:00 PM<br>
                   <strong>Saturday:</strong> 10:00 AM - 5:00 PM<br>
                   <strong>Sunday:</strong> Closed
               </td>
           </tr>
           <tr>
               <td class="info-label">Contact Information</td>
               <td>
                   <strong>Phone:</strong> (201) 555-0200<br>
                   <strong>Email:</strong> info@glowsalon.com
               </td>
           </tr>
           <tr>
               <td class="info-label">Walk-In Policy</td>
               <td>
                   Walk-ins accepted Monday - Friday until closing.<br> 
                   No walk-ins on weekends.<br>
                   Walk-ins are not guaranteed preferred technicians.<br>
                   We recommend booking an appointment in advance to
                   guarantee your preferred time, service, and technician.
               </td>
           </tr>
           <tr>
               <td class="info-label">General Inquiries</td>
               <td>
                   For additional questions about services, pricing, or availability,
                   please call the salon at (201) 555-0200 during business hours or email
                   <strong>info@glowsalon.com</strong> and a team member will respond as soon as possible.
               </td>
           </tr>
           <tr>
               <td class="info-label">Payment Options</td>
               <td>
                   <strong>In person only.</strong><br>
                   Payments are accepted at the salon at the time of your visit to ensure client satisfaction.
               </td>
           </tr>
           <tr>
               <td class="info-label">Booking Appointments</td>
               <td>
                   Register or log in to your dashboard to book an appointment.<br>
                   <a href="register.php">Register</a> or <a href="login.php">Login</a> to get started.
               </td>
           </tr>
       </tbody>
   </table>
</div>


<?php include 'includes/footer.php'; ?>
