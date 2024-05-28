package ml.cf.collaborativefilteing.services;

import ml.cf.collaborativefilteing.dto.BookDTO;
import ml.cf.collaborativefilteing.dto.RecommendationDTO;
import ml.cf.collaborativefilteing.models.Book;

import java.util.List;

public interface RecommenderService {
    RecommendationDTO getRecommendedBooks(Integer userId, int top);
}
