// bluetooth.js
document.addEventListener("DOMContentLoaded", function() {
    const checkInBtn = document.getElementById('checkInBtn');
    const checkOutBtn = document.getElementById('checkOutBtn');
    const statusDiv = document.getElementById('status');

    const handleCheckIn = async () => {
        try {
            const device = await navigator.bluetooth.requestDevice({
                acceptAllDevices: true,
                optionalServices: ['battery_service']
            });

            const server = await device.gatt.connect();
            console.log(`Connected to device: ${device.name}`);

            const response = await axios.post('/api/attendance/check-in', {}, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('authToken')}` // Use actual token
                }
            });

            statusDiv.textContent = response.data.message;
        } catch (error) {
            console.error(error);
            statusDiv.textContent = 'Check-in failed';
        }
    };

    const handleCheckOut = async () => {
        try {
            const device = await navigator.bluetooth.requestDevice({
                acceptAllDevices: true,
                optionalServices: ['battery_service']
            });

            const server = await device.gatt.connect();
            console.log(`Connected to device: ${device.name}`);

            const response = await axios.post('/api/attendance/check-out', {}, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('authToken')}` // Use actual token
                }
            });

            statusDiv.textContent = response.data.message;
        } catch (error) {
            console.error(error);
            statusDiv.textContent = 'Check-out failed';
        }
    };

    checkInBtn.addEventListener('click', handleCheckIn);
    checkOutBtn.addEventListener('click', handleCheckOut);
});
