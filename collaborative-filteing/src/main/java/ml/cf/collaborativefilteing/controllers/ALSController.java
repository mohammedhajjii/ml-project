package ml.cf.collaborativefilteing.controllers;


import lombok.AllArgsConstructor;
import ml.cf.collaborativefilteing.dto.BookConverter;
import ml.cf.collaborativefilteing.dto.BookDTO;
import ml.cf.collaborativefilteing.dto.RecommendationDTO;
import ml.cf.collaborativefilteing.repositories.BookRepository;
import ml.cf.collaborativefilteing.services.RecommenderService;
import org.apache.spark.ml.recommendation.ALSModel;
import org.apache.spark.sql.SparkSession;
import org.springframework.web.bind.annotation.*;

import java.util.List;


@RestController
@RequestMapping("/app")
@AllArgsConstructor
public class ALSController {

    private final RecommenderService recommenderService;

    @GetMapping("/recs")
    public RecommendationDTO getRecommendationFor(@RequestParam("userId") Integer userId){
        return recommenderService.getRecommendedBooks(userId, 4);
    }

}
