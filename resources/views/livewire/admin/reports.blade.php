<div>
    <h2>Tracer Study Reports</h2>

    <div class="grid grid-cols-2 gap-4">
        <!-- Employment Rate Card -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Employment Rate</h3>
            <p class="text-2xl">{{ number_format($employmentRate, 2) }}%</p>
        </div>

        <!-- Average Waiting Period Card -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Average Waiting Period (Months)</h3>
            <p class="text-2xl">{{ number_format($avgWaitingPeriod, 2) }}</p>
        </div>
    </div>

    <!-- Employment Rate Chart -->
    <div class="my-8">
        <h3 class="text-lg font-bold">Employment Rate Over Time</h3>
        <canvas id="employmentChart"></canvas>
    </div>

    <!-- Average Waiting Period Chart -->
    <div class="my-8">
        <h3 class="text-lg font-bold">Average Waiting Period Over Time</h3>
        <canvas id="waitingPeriodChart"></canvas>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        // Employment Rate Chart Data
        const employmentCtx = document.getElementById('employmentChart').getContext('2d');
        const employmentChart = new Chart(employmentCtx, {
            type: 'line',
            data: {
                labels: ['Current Employment Rate'], // Change as needed
                datasets: [{
                    label: 'Employment Rate',
                    data: [{{ number_format($employmentRate, 2) }}], // Wrap it in an array
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                }]
            }
        });

        // Average Waiting Period Chart Data
        const waitingCtx = document.getElementById('waitingPeriodChart').getContext('2d');
        const waitingPeriodChart = new Chart(waitingCtx, {
            type: 'bar',
            data: {
                labels: ['Current Average Waiting Period'], // Change as needed
                datasets: [{
                    label: 'Average Waiting Period (Months)',
                    data: [{{ number_format($avgWaitingPeriod, 2) }}], // Wrap it in an array
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                }]
            }
        });
    });
</script>

