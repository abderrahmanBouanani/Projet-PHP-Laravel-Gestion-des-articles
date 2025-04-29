<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
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
            --danger-color: #ef476f;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 3rem 0;
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
        
        .content-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .content-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .btn-create {
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-create:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
            color: white;
        }
        
        .article-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .article-item {
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .article-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-color: #ced4da;
        }
        
        .article-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
        }
        
        .article-title i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }
        
        .article-content {
            color: #6c757d;
            margin-bottom: 1.25rem;
            font-size: 0.95rem;
            line-height: 1.6;
            max-height: 4.8rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        
        .article-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .btn-edit {
            color: var(--accent-color);
            background-color: rgba(72, 149, 239, 0.1);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-edit:hover {
            background-color: rgba(72, 149, 239, 0.2);
            color: var(--accent-color);
        }
        
        .btn-delete {
            color: var(--danger-color);
            background-color: rgba(239, 71, 111, 0.1);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-delete:hover {
            background-color: rgba(239, 71, 111, 0.2);
            color: var(--danger-color);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 3rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        .empty-state h3 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            
            .content-container {
                padding: 1.5rem;
            }
            
            .article-actions {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .btn-edit, .btn-delete {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-newspaper me-2"></i>Liste des articles</h1>
            <p>Découvrez et gérez tous vos articles</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="text-center mb-4">
                    <a href="{{ route('articles.create') }}" class="btn btn-create">
                        <i class="fas fa-plus-circle me-2"></i>Créer un nouvel article
                    </a>
                </div>
                
                <div class="content-container">
                    @if(count($articles) > 0)
                    <ul class="article-list">
                        @foreach($articles as $article)
                        <li class="article-item">
                            <div class="article-title">
                                <i class="fas fa-file-alt"></i>
                                {{ $article->titre }}
                            </div>
                            <div class="article-content">
                                {{ $article->contenu }}
                            </div>
                            <div class="article-actions">
                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-edit">
                                    <i class="fas fa-pen me-2"></i>Modifier
                                </a>
                                <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                        <i class="fas fa-trash-alt me-2"></i>Supprimer
                                    </button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h3>Aucun article trouvé</h3>
                        <p>Commencez par créer votre premier article</p>
                    </div>
                    @endif
                </div>
                
                <div class="text-center text-muted">
                    <small>
                        <i class="fas fa-info-circle me-1"></i>
                        Les articles sont affichés du plus récent au plus ancien
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
            // Animation des éléments de la liste au chargement
            const articleItems = document.querySelectorAll('.article-item');
            
            articleItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 100 * index);
            });
            
            // Confirmation de suppression
            const deleteForms = document.querySelectorAll('form');
            
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>