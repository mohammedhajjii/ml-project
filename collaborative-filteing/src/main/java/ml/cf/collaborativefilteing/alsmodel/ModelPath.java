package ml.cf.collaborativefilteing.alsmodel;

import lombok.Getter;
import lombok.Setter;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.boot.context.properties.ConfigurationProperties;
import org.springframework.context.annotation.Configuration;

@Configuration
@ConfigurationProperties(prefix = "als.model")
@Getter @Setter
public class ModelPath {
    private String path;
}
