package ml.cf.collaborativefilteing.alsmodel;

import org.apache.spark.SparkConf;
import org.apache.spark.SparkContext;
import org.apache.spark.ml.recommendation.ALSModel;
import org.apache.spark.sql.SparkSession;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

@Configuration
public class RecommenderConfiguration {


    @Bean
    public SparkSession sparkSession(){
        SparkConf sparkConf = new SparkConf()
                .setAppName("cf-app")
                .setMaster("local[*]");
        SparkContext sparkContext = new SparkContext(sparkConf);
        return SparkSession.builder()
                .sparkContext(sparkContext)
                .getOrCreate();
    }

    @Bean
    public Recommander recommander(SparkSession sparkSession, ModelPath modelPath){
        return  new Recommander(sparkSession, modelPath.getPath());
    }
}
