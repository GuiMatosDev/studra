// 1. Estado da Aplicação

let currentView = 'dashboard';
let editingTaskId = null;
let editingNoteId = null;

// 2. Inicialização

document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    setupNavigation();
    setupSearch();
    updateStats();
    renderDashboard();
    renderAllTasks();
    renderAllNotes();
}

// 3. Navegação entre Visualização de Tarefas e Anotações

function setupNavigation() {
    const navItems = document.querySelectorAll('.nav-item');
    
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            const view = this.getAttribute('data-view');
            switchView(view);
        });
    });
}

function switchView(view) {
    // Atualizar estado
    currentView = view;
    
    // Remover classe active de todos os nav-items
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('active');
    });
    
    // Adicionar classe active ao item clicado
    document.querySelector(`[data-view="${view}"]`).classList.add('active');
    
    // Esconder todas as views
    document.querySelectorAll('.view-container').forEach(container => {
        container.classList.add('hidden');
    });
    
    // Mostrar view selecionada
    const viewMap = {
        'dashboard': 'dashboardView',
        'tasks': 'tasksView',
        'notes': 'notesView',
        'settings': 'settingsView'
    };
    
    document.getElementById(viewMap[view]).classList.remove('hidden');
}

// 4. Busca Global

function setupSearch() {
    const searchInput = document.getElementById('searchInput');
    
    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase();
        filterContent(query);
    });
}

function filterContent(query) {
    if (!query) {
        renderDashboard();
        renderAllTasks();
        renderAllNotes();
        return;
    }
    
    // Filtrar tarefas
    const filteredTasks = tasks.filter(task => 
        task.nome.toLowerCase().includes(query) || 
        task.descricao.toLowerCase().includes(query)
    );
    
    // Filtrar notas
    const filteredNotes = notes.filter(note => 
        note.titulo.toLowerCase().includes(query) || 
        note.conteudo.toLowerCase().includes(query)
    );
    
    // Renderizar resultados filtrados
    renderRecentTasks(filteredTasks.slice(0, 5));
    renderRecentNotes(filteredNotes.slice(0, 6));
    renderTasksList('allTasksList', filteredTasks);
    renderNotesList('allNotesList', filteredNotes);
}

// 5. Estatísticas

function updateStats() {
    const totalTasks = tasks.length;
    const doneTasks = tasks.filter(t => t.status_ === 'concluida').length;
    const inProgressTasks = tasks.filter(t => t.status_ === 'em andamento').length;
    const todoTasks = tasks.filter(t => t.status_ === 'pendente').length;
    
    document.getElementById('totalTasks').textContent = totalTasks;
    document.getElementById('doneTasks').textContent = doneTasks;
    document.getElementById('inProgressTasks').textContent = inProgressTasks;
    document.getElementById('todoTasks').textContent = todoTasks;
}

// 6. Renderização do Dashboard

function renderDashboard() {
    const recentTasks = tasks.slice(0, 5);
    const recentNotes = notes.slice(0, 6);
    
    renderRecentTasks(recentTasks);
    renderRecentNotes(recentNotes);
}

function renderRecentTasks(tasksList) {
    const container = document.getElementById('recentTasksList');
    
    if (tasksList.length === 0) {
        container.innerHTML = '<p class="text-gray">Nenhuma tarefa encontrada.</p>';
        return;
    }
    
    container.innerHTML = tasksList.map(task => createTaskCard(task)).join('');
}

function renderRecentNotes(notesList) {
    const container = document.getElementById('recentNotesList');
    
    if (notesList.length === 0) {
        container.innerHTML = '<p class="text-gray">Nenhuma anotação encontrada.</p>';
        return;
    }
    
    container.innerHTML = notesList.map(note => createNoteCard(note)).join('');
}

// 7. Renderização de Tarefas

function renderAllTasks() {
    renderTasksList('allTasksList', tasks);
}

function renderTasksList(containerId, tasksList) {
    const container = document.getElementById(containerId);
    
    if (tasksList.length === 0) {
        container.innerHTML = '<p class="text-gray">Nenhuma tarefa encontrada.</p>';
        return;
    }
    
    container.innerHTML = tasksList.map(task => createTaskCard(task)).join('');
}

function createTaskCard(task) {
    const statusLabels = {
        'todo': 'A Fazer',
        'in-progress': 'Em Andamento',
        'done': 'Concluído'
    };
    
    const priorityLabels = {
        'low': 'Baixa',
        'medium': 'Média',
        'high': 'Alta'
    };
    
    const priorityColors = {
        'low': '#10b981',
        'medium': '#f59e0b',
        'high': '#ef4444'
    };
    
    const statusIcons = {
        'todo': '<circle cx="12" cy="12" r="10" stroke-width="2"/>',
        'in-progress': '<circle cx="12" cy="12" r="10" stroke-width="2"/><path d="M12 6v6l4 2" stroke-width="2"/>',
        'done': '<path d="M22 11.08V12a10 10 0 11-5.93-9.14" stroke-width="2"/><path d="M22 4L12 14.01l-3-3" stroke-width="2"/>'
    };
    
    const dueDate = new Date(task.data_termino).toLocaleDateString('pt-BR');
    
    return `
        <div class="task-card" data-task-id="${task.id}">
            <div class="task-header">
                <div class="task-info">
                    <h3>${task.nome}</h3>
                    <p>${task.descricao}</p>
                </div>
                <div class="task-actions">
                    <button class="btn-icon" onclick="editTask('${task.id}')" title="Editar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" stroke-width="2"/>
                        </svg>
                    </button>
                    <button class="btn-icon" onclick="deleteTask('${task.id}')" title="Deletar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M3 6h18M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2" stroke-width="2"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="task-meta">
                <span class="task-status task-status-${task.status_}">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        ${statusIcons[task.status_]}
                    </svg>
                    ${statusLabels[task.status_]}
                </span>
                <span class="task-priority" style="color: ${priorityColors[task.priority]}">
                    ${priorityLabels[task.priority]}
                </span>
                <span class="task-date">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke-width="2"/>
                        <path d="M16 2v4M8 2v4M3 10h18" stroke-width="2"/>
                    </svg>
                    ${dueDate}
                </span>
            </div>
        </div>
    `;
}

// 8. Renderização de Notas

function renderAllNotes() {
    renderNotesList('allNotesList', notes);
}

function renderNotesList(containerId, notesList) {
    const container = document.getElementById(containerId);
    
    if (notesList.length === 0) {
        container.innerHTML = '<p class="text-gray">Nenhuma anotação encontrada.</p>';
        return;
    }
    
    container.innerHTML = notesList.map(note => createNoteCard(note)).join('');
}

function createNoteCard(note) {
    const createdDate = new Date(note.data_criacao).toLocaleDateString('pt-BR');
    const preview = note.conteudo.length > 100 ? note.conteudo.substring(0, 100) + '...' : note.content;
    
    return `
        <div class="note-card" data-note-id="${note.id}">
            <div class="note-header">
                <h3>${note.titulo}</h3>
                <div class="note-actions">
                    <button class="btn-icon" onclick="editNote('${note.id}')" title="Editar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" stroke-width="2"/>
                        </svg>
                    </button>
                    <button class="btn-icon" onclick="deleteNote('${note.id}')" title="Deletar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M3 6h18M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2" stroke-width="2"/>
                        </svg>
                    </button>
                </div>
            </div>
            <p class="note-content">${preview}</p>
            <p class="note-date">${createdDate}</p>
        </div>
    `;
}

// 9. Modal de Tarefas

function showTaskModal() {
    editingTaskId = null;
    document.getElementById('taskForm').reset();
    document.querySelector('#taskModal .modal-header h2').textContent = 'Nova Tarefa';
    document.querySelector('#taskForm button[type="submit"]').textContent = 'Criar Tarefa';
    document.getElementById('taskModal').classList.remove('hidden');
}

function hideTaskModal() {
    document.getElementById('taskModal').classList.add('hidden');
    document.getElementById('taskForm').reset();
    editingTaskId = null;
}

function editTask(taskId) {
    const task = tasks.find(t => t.id === taskId);
    if (!task) return;
    
    editingTaskId = taskId;
    document.getElementById('taskTitle').value = task.nome;
    document.getElementById('taskDescription').value = task.descricao;
    document.getElementById('taskPriority').value = task.priority;
    document.getElementById('taskDueDate').value = task.data_termino;
    
    document.querySelector('#taskModal .modal-header h2').textContent = 'Editar Tarefa';
    document.querySelector('#taskForm button[type="submit"]').textContent = 'Salvar Alterações';
    document.getElementById('taskModal').classList.remove('hidden');
}

function handleTaskSubmit(event) {
    // Dados da API para enviar tarefa.
}

function deleteTask(taskId) {
        // Dados da API para excluir tarefa.
}

// 10. Modal de Notas

function showNoteModal() {
    editingNoteId = null;
    document.getElementById('noteForm').reset();
    document.querySelector('#noteModal .modal-header h2').textContent = 'Nova Anotação';
    document.querySelector('#noteForm button[type="submit"]').textContent = 'Criar Anotação';
    document.getElementById('noteModal').classList.remove('hidden');
}

function hideNoteModal() {
    document.getElementById('noteModal').classList.add('hidden');
    document.getElementById('noteForm').reset();
    editingNoteId = null;
}

function editNote(noteId) {
    const note = notes.find(n => n.id === noteId);
    if (!note) return;
    
    editingNoteId = noteId;
    document.getElementById('noteTitle').value = note.titulo;
    document.getElementById('noteContent').value = note.conteudo;
    
    document.querySelector('#noteModal .modal-header h2').textContent = 'Editar Anotação';
    document.querySelector('#noteForm button[type="submit"]').textContent = 'Salvar Alterações';
    document.getElementById('noteModal').classList.remove('hidden');
}

function handleNoteSubmit(event) {
    // Dados da API para enviar anotação.
}

function deleteNote(noteId) {
    // Dados da API para excluir anotação.
}