// Asks datetime.php for the current date, time and day every second
const el = id => document.getElementById(id);

async function updateClock() {
  try {
    const res = await fetch('datetime.php', { cache: 'no-store' });
    if (!res.ok) throw new Error('Bad response');
    const d = await res.json();

    el('day').textContent = d.day;
    el('time').textContent = d.time;
    el('meridiem').textContent = d.meridiem;
    el('date').textContent = d.date;
    el('zone').textContent = d.timezone;
    el('error').hidden = true;
  } catch (e) {
    el('error').hidden = false;
  }
}

updateClock();
setInterval(updateClock, 1000);