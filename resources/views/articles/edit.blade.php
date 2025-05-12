@extends('layouts.app')
@section('content')
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --warning-color: #ffd166;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--dark-color);
        }
        
        .page-header h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        
        .page-header p {
            color: #6c757d;
            font-size: 1.1rem;
        }
        
        .form-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background-color: var(--warning-color);
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .form-control::placeholder {
            color: #adb5bd;
            font-weight: 300;
        }
        
        .input-group-text {
            background-color: var(--light-color);
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: var(--primary-color);
        }
        
        .input-with-icon .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }
        
        .btn-outline-secondary {
            color: #6c757d;
            border-color: #ced4da;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
            color: #495057;
        }
        
        .character-count {
            color: #6c757d;
            font-size: 0.85rem;
            text-align: right;
            margin-top: 0.5rem;
        }
        
        .form-text {
            color: #6c757d;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
        
        .form-floating label {
            padding: 1rem;
        }
        
        .form-floating .form-control {
            height: calc(3.5rem + 2px);
            padding: 1rem 0.75rem;
        }
        
        .form-floating textarea.form-control {
            height: auto;
            min-height: 200px;
        }
        
        .edit-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: var(--warning-color);
            color: #212529;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }
        
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            
            .form-container {
                padding: 1.5rem;
            }
            
            .edit-badge {
                position: static;
                margin-bottom: 1rem;
                display: inline-flex;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-edit me-2"></i>Modifier l'article</h1>
            <p>Mettez à jour votre contenu</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="form-container">
                    <span class="edit-badge">
                        <i class="fas fa-pencil-alt"></i> Mode édition
                    </span>
                    
                    <form method="POST" action="{{ route('articles.update', $article) }}" id="editForm">
                        @csrf @method('PUT')
                        
                        <div class="mb-4">
                            <label for="titre" class="form-label">
                                <i class="fas fa-heading me-2"></i>Titre de l'article
                            </label>
                            <div class="input-group input-with-icon">
                                <span class="input-group-text">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <input type="text" class="form-control" id="titre" name="titre" 
                                       value="{{ $article->titre }}" required
                                       maxlength="100" data-bs-toggle="tooltip" 
                                       title="Le titre doit être concis et accrocheur">
                            </div>
                            <div class="character-count">
                                <span id="titreCount">0</span>/100 caractères
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="contenu" class="form-label">
                                <i class="fas fa-align-left me-2"></i>Contenu de l'article
                            </label>
                            <div class="form-floating">
                                <textarea class="form-control" id="contenu" name="contenu" 
                                          required style="min-height: 200px;">{{ $article->contenu }}</textarea>
                                <label for="contenu">Rédigez votre article ici...</label>
                            </div>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Utilisez un langage clair et concis pour captiver vos lecteurs.
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Annuler
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="text-center text-muted">
                    <small>
                        <i class="fas fa-history me-1"></i>
                        Dernière modification : {{ $article->updated_at->format('d/m/Y à H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser les tooltips Bootstrap
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Compteur de caractères pour le titre
            const titreInput = document.getElementById('titre');
            const titreCount = document.getElementById('titreCount');
            
            // Initialiser le compteur avec la valeur actuelle
            titreCount.textContent = titreInput.value.length;
            
            titreInput.addEventListener('input', function() {
                const count = this.value.length;
                titreCount.textContent = count;
                
                // Changer la couleur si on approche de la limite
                if (count > 80) {
                    titreCount.style.color = '#dc3545';
                } else {
                    titreCount.style.color = '#6c757d';
                }
            });
            
            // Animation d'entrée
            const formContainer = document.querySelector('.form-container');
            formContainer.style.opacity = '0';
            formContainer.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                formContainer.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                formContainer.style.opacity = '1';
                formContainer.style.transform = 'translateY(0)';
            }, 100);
            
            // Confirmation avant de quitter si des modifications ont été apportées
            const form = document.getElementById('editForm');
            let formChanged = false;
            
            const formElements = form.querySelectorAll('input, textarea');
            formElements.forEach(element => {
                element.addEventListener('change', function() {
                    formChanged = true;
                });
            });
            
            window.addEventListener('beforeunload', function(e) {
                if (formChanged) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });
        });
    </script>
</body>
@endsection