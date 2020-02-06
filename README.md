<h1>Ibis Full Stack Application</h1>
<p>Packs PHP, Laravel, jQuery, Bootstrap, DatePicker, AJAX, chart.JS & a couple more</p>

- Custom Laravel Auth controller (only login & register route for testing) while maintaining functinalities of middleware, etc
- jQuery two-way auto-suggest and auto-complete via AJAX
- DatePicker library used for selecting date ranges
- Routes guarded by auth middleware
- Implements front-end charts via chart.JS
- Adaptable time & date for charts (MacAddressController handles it)
- Carbon class used to retroactively generate data

---
Use the seeders:
- ContractSeeder to generate contract & macs
- Edit the MacAddressSeeder.php to generate retro-data (didn't have time to link the two of them)

---

- Picky about one day info and last measurement probably isn't accurate. MacAddressController needs fixing.
