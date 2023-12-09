
const schedule = {
    'pediatra': {
        'name': 'Juliana Alves',
        'crm': '101205 SP',
        'location': 'Rua Conselheiro Furtado, 150- Liberdade, São Paulo',
        'price': 'Ver preço',
        'contact': '(011) 9887-5565',
        'schedule': {
            'Segunda-feira': ['09:00', '11:00', '14:00'],
            'Terça-feira': ['09:00', '11:00', '14:00'],
            'Quarta-feira': ['09:00', '11:00', '14:00'],
            'Quinta-feira': ['09:00', '11:00', '14:00'],
            'Sexta-feira': ['09:00', '11:00', '14:00'],
            'Sabado': ['09:00', '11:00', '14:00']
        }
    }
}



// Função para armazenar as informações no localStorage
function saveAppointment(doctor, date, time) {
    localStorage.setItem(`appointment_${doctor}_${date}`, time);
}

// Função para recuperar as informações do localStorage
function getAppointment(doctor, date) {
    return localStorage.getItem(`appointment_${doctor}_${date}`);
}


// Renderiza o calendário na página
function renderSchedule(schedule) {
    const container = document.querySelector('.calendar');
    container.innerHTML = '';

    for (const day in schedule.pediatra.schedule) {
        const timeSlots = schedule.pediatra.schedule[day];

        const column = document.createElement('div');
        column.innerHTML = `<h3>${day}</h3>`;

        timeSlots.forEach(time => {
            const button = document.createElement('button');
            button.textContent = time;
            button.addEventListener('click', () => {
                saveAppointment('pediatra', day, time);
                alert(`Consulta agendada com sucesso! Data: ${day}, Horário: ${time}`);
            });
            column.appendChild(button);
        });

        container.appendChild(column);
    }
}



renderSchedule(schedule);
